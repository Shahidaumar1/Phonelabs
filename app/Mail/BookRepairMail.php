<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Branch;
use Illuminate\Support\Facades\Log;

class BookRepairMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $patient;
    public $form;
    public $form_type;
    public $repair_detail;
    public $type;
    public $branch;

    public function __construct($patient, $form, $form_type, $repair_detail, $type)
    {
        $this->patient = $patient;
        $this->form = $form;
        $this->form_type = $form_type;
        $this->repair_detail = $repair_detail;
        $this->type = $type;

        // Fetch branch details based on clinic_name or form data
        $clinicName = session('clinic_name');
        $this->branch = $clinicName ? Branch::where('name', $clinicName)->first() : null;
        if (!$this->branch && isset($form['name'])) {
            $this->branch = Branch::where('name', $form['name'])->first();
        }
        if (!$this->branch) {
            $this->branch = Branch::first(); // Fallback to first branch
        }

        Log::info('Selected Branch:', ['branch' => $this->branch ? $this->branch->toArray() : null]);
        Log::info('Session clinic-name:', ['clinic_name' => $clinicName]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your ' . $this->repair_detail['device'] . ' ' . $this->repair_detail['model'] . ' repair booking with ' . ($this->branch->name ?? 'us'),
        );
    }

    public function content(): Content
    {
        // Default template
        $template = 'emails.clinic_repair_lb_temp';
        $clinicName = session('clinic_name') ?? $this->form_type;

        Log::info('Determining email template:', ['clinic_name' => $clinicName, 'form_type' => $this->form_type]);

        // Determine the correct email template based on form_type and clinic name
        switch ($clinicName) {
            case 'clinic_form':
                if (isset($this->form['name'])) {
                    switch ($this->form['name']) {
                        case 'London Bridge Surgery':
                            $template = 'emails.clinic_repair_lb_temp';
                            break;
                        case 'Liverpool Street Clinic':
                            $template = 'emails.clinic_repair_ls_temp';
                            break;
                        case 'Canary Wharf Clinic':
                            $template = 'emails.clinic_repair_cw_temp';
                            break;
                        default:
                            Log::warning('Unexpected clinic name:', ['name' => $this->form['name']]);
                            $template = 'emails.clinic_repair_lb_temp';
                            break;
                    }
                } else {
                    Log::warning('Form name is missing.');
                    $template = 'emails.clinic_repair_lb_temp';
                }
                break;
            case 'postal_form':
                $template = 'emails.postal_repair_temp';
                break;
            case 'fix_form':
                $template = 'emails.fix_at_my_address_temp';
                break;
            case 'collection_form':
                $template = 'emails.collect_my_device_temp';
                break;
            default:
                Log::warning('Unexpected form type:', ['type' => $clinicName]);
                $template = 'emails.clinic_repair_lb_temp';
                break;
        }

        // Log branch details for debugging
        Log::info('Branch details:', [
            'name' => $this->branch ? $this->branch->name : 'Not Available',
            'map_link' => $this->branch ? $this->branch->map_link : 'Not Available'
        ]);

        return new Content(
            view: $template,
            with: [
                'data' => [
                    'patient' => $this->patient,
                    'form' => $this->form,
                    'repair_detail' => $this->repair_detail,
                    'form_type' => $this->form_type,
                    'type' => $this->type,
                ],
                'branch' => $this->branch,
            ]
        );
    }

    public function attachments()
    {
        return [];
    }
}