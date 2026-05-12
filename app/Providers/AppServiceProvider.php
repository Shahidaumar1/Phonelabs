<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;
use App\Models\Branch;
use App\Models\WebsiteContent;
use Livewire\Livewire;
use App\Http\Livewire\Guest\RepairDetail;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        $siteSettings = SiteSetting::latest()->first();
        View::share('siteSettings', $siteSettings);
        $siteBranch = Branch::first();
        View::share('siteBranch', $siteBranch);
        $webContent = [];
        $websiteContents = WebsiteContent::all();
        foreach ($websiteContents as $content) {
            $webContent[$content->key] = $content->text;
        }
        $webContent = (object) $webContent;
        View::share('webContent', $webContent);
        Livewire::component('guest.components.clinic-repair-form', \App\Http\Livewire\Guest\Components\ClinicRepairForm::class);
        Livewire::component('guest.repair-detail', RepairDetail::class);


    }
}
