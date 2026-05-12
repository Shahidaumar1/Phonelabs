<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Branch;

class BookDeviceBuyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $patient;
    public $form;
    public $branch;
    public $buy_detail;
    public $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($patient, $form, $buy_detail, $type)
    {
        $this->patient    = $patient;
        $this->form       = $form;
        $this->buy_detail = $buy_detail;
        $this->type       = $type;

        /**
         * 🔧 Normalize data so email sab flows pe safe chale:
         * - Accessories flow me 'device' nahi hota, sirf 'modal'
         * - Buy device / repair waale flows pe already 'device' + 'modal' hota hai
         */

        // Agar device missing hai ya array nahi hai -> modal se bana do
        if (
            !isset($this->buy_detail['device']) ||
            !is_array($this->buy_detail['device'])
        ) {
            $modalName = $this->buy_detail['modal']['name'] ?? 'Accessory';

            $this->buy_detail['device'] = [
                'name' => $modalName,
            ];
        }

        // Agar modal ka name missing hai lekin device ka name hai -> sync kar do
        if (
            !isset($this->buy_detail['modal']['name']) &&
            isset($this->buy_detail['device']['name'])
        ) {
            // ensure modal array exist
            if (!isset($this->buy_detail['modal']) || !is_array($this->buy_detail['modal'])) {
                $this->buy_detail['modal'] = [];
            }

            $this->buy_detail['modal']['name'] = $this->buy_detail['device']['name'];
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // service type (sell / repair / buy / Accessories etc.)
        $service = strtolower($this->buy_detail['service'] ?? '');

        $deviceName = $this->buy_detail['device']['name'] ?? null;
        $modalName  = $this->buy_detail['modal']['name'] ?? null;

        // Accessories ke liye subject me mainly product/modal ka naam use karein
        if ($service === 'accessories') {
            $subjectDevicePart = $modalName ?? $deviceName ?? 'Accessory';
        } else {
            // Baaki flows (buy device / repair / sell):
            // Device + modal ko join kar do
            $subjectDevicePart = trim(
                ($deviceName ?? '') . ' ' . ($modalName ?? '')
            );
        }

        if ($subjectDevicePart === '') {
            $subjectDevicePart = 'Device';
        }

        return new Envelope(
            subject: 'Your ' . $subjectDevicePart . ' booking with our company...',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $template = "emails.buy.clinic_repair_lb_temp";

        if (session('form_type') == 'clinic_form') {
            switch ($this->form['name'] ?? '') {
                case 'London Bridge Surgery':
                    $template = 'emails.buy.clinic_repair_lb_temp';
                    break;
                case 'Liverpool Street Clinic':
                    $template = 'emails.buy.clinic_repair_ls_temp';
                    break;
                case 'Canary Wharf Clinic':
                    $template = 'emails.buy.clinic_repair_cw_temp';
                    break;
                default:
                    // unexpected clinic name
                    break;
            }
        }

        if (session('form_type') == 'postal_form') {
            $template = 'emails.buy.postal_repair_temp';
        }

        if (session('form_type') == 'fix_form') {
            $template = 'emails.buy.fix_at_my_address_temp';
        }

        if (session('form_type') == 'collection_form') {
            $template = 'emails.buy.collect_my_device_temp';
        }

        if (isset($this->form['name'])) {
            $this->branch = Branch::where('name', $this->form['name'])->first();
        }

        return new Content(
            view: $template,
            with: [
                'data' => [
                    'patient'        => $this->patient,
                    'form'           => $this->form,
                    'buy_detail'     => $this->buy_detail,
                    'selectedBranch' => $this->branch,
                ],
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
