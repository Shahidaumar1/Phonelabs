@extends('frontend.layouts.app')

@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
@endpush

@push('head-scripts')
    <meta name="google-site-verification" content="VBeQKFx66BgWgsYX-MVEK9At7HDHXS7ZS1GDqYLdCiM" />
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PLKSQVFN');</script>
    <!-- End Google Tag Manager -->
@endpush

@section('content')

@php
use App\Models\FormStatus;
$formStatuses = FormStatus::where('name', 'services')->first();
@endphp

<div style="width: 100%; overflow-x: hidden;">
    {{-- Top Bar Commented Out --}}
    {{-- <livewire:components.top-bar /> --}}
    
    {{-- Mega Navigation --}}
    <livewire:components.mega-nav />
    
    {{-- Home Page Sections --}}
    @include('frontend.Home_page_sections.banner')
    @include('frontend.Home_page_sections.selectAdeviceSection')
    @include('frontend.Home_page_sections.devicesAndBrandsSection')
     @include('frontend.Home_page_sections.repairOptinsSec')
        @include('frontend.Home_page_sections.wecanFix')
    @include('frontend.Home_page_sections.whyWeChoose')
  
     @include('frontend.Home_page_sections.testinomials')
    @include('frontend.Home_page_sections.formAndLocationSec')
</div>

@endsection