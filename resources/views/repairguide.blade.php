{{-- resources/views/repairguide.blade.php --}}
@extends('layouts.app')

@section('content')

<style>

html{ scroll-behavior:smooth; }

/* Hide layout navigation bar (container-fluid from app.blade.php) */
body > div.container-fluid {
    display: none !important;
}

/* Hide layout's simple bg-light footer */
body > footer.bg-light {
    display: none !important;
}

/* CRITICAL: The layout wraps content in <div class="container mt-5">
   We break out of it by making it full width with no padding */
.container.mt-5 {
    max-width: 100% !important;
    width: 100% !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-top: 0 !important;
}

body {
    overflow-x: hidden !important;
}

/* FAQ card style */
.faq-card {
    border: 1px solid #f1d5de;
    border-radius: 14px;
}
.faq-card + .faq-card { margin-top: 14px; }
.faq-card h3 { font-size: 1.05rem; margin-bottom: .5rem; color: #212529 !important; }
.faq-card .answer { color: #6c757d !important; font-size: .94rem; }
.faq-card { background: #ffffff !important; }
.bg-color { background: #ffffff !important; }

/* Sticky left menu */
.faq-menu { position: sticky; top: 18px; }
.faq-menu .list-group-item { border: none; padding: .5rem .75rem; font-size: .95rem; }
.faq-menu .list-group-item.active { background: #00AEEF; color: #fff; }

.faq-container { margin-bottom: 4rem; }

@media (min-width: 1200px) {
    .faq-container { max-width: 1100px; }
}

</style>

<div>
<section class="repair-types" style="width:100%;max-width:100%;padding:0;margin:0;">

<livewire:components.mega-nav theme="white" />

<div class="bg-color">
<div class="container faq-container my-4 my-md-5" style="font-family:'Segoe UI', Roboto, Arial, sans-serif;">

<div class="text-center py-5">
<h2 class="fw-bold m-0" style="color:#00AEEF;">Repair Guide</h2>
</div>

<div class="row g-4 mt-2">

{{-- LEFT MENU --}}
<aside class="col-lg-4">
<div class="faq-menu shadow-sm rounded-4 p-3 border">
<h6 class="fw-bold mb-2" style="color:#00AEEF;">Questions</h6>
<div class="list-group" id="faqMenu">
<a class="list-group-item list-group-item-action" href="#q1">Do I lose data with a screen replacement?</a>
<a class="list-group-item list-group-item-action" href="#q2">Do I need a new battery?</a>
<a class="list-group-item list-group-item-action" href="#q3">Phone in water — what now?</a>
<a class="list-group-item list-group-item-action" href="#q4">Not charging: port vs battery</a>
<a class="list-group-item list-group-item-action" href="#q5">Privacy & data access</a>
<a class="list-group-item list-group-item-action" href="#q6">Parts quality (OEM/aftermarket)</a>
<a class="list-group-item list-group-item-action" href="#q7">Booking vs walk-in</a>
<a class="list-group-item list-group-item-action" href="#q8">Diagnostic fee</a>
<a class="list-group-item list-group-item-action" href="#q9">How long do repairs take?</a>
<a class="list-group-item list-group-item-action" href="#q10">What warranty do I get?</a>
<a class="list-group-item list-group-item-action" href="#q11">Will True Tone/Face ID/Touch ID be affected?</a>
<a class="list-group-item list-group-item-action" href="#q12">Do I need to back up first?</a>
<a class="list-group-item list-group-item-action" href="#q13">After-repair care tips</a>
<a class="list-group-item list-group-item-action" href="#q14">Why can a quote change?</a>
</div>
</div>
</aside>

{{-- RIGHT FAQ --}}
<div class="col-lg-8" id="faqContent">

<article id="q1" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">Do I lose data when I replace my screen?</h3>
<div class="answer">Screen repairs don't touch your storage — your data stays safe. If there's water damage or severe board faults, back up first.</div>
</article>

<article id="q2" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">How do I know if I need a new battery?</h3>
<div class="answer">Fast drain, random shutdowns, swelling, or iPhone Battery Health &lt; 80% are classic signs.</div>
</article>

<article id="q3" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">I dropped my phone in water — what should I do?</h3>
<div class="answer">Power off immediately, don't charge, and bring it in ASAP.</div>
</article>

<article id="q4" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">My phone isn't charging — is it the port or the battery?</h3>
<div class="answer">We test with a known-good cable, inspect the port and run diagnostics.</div>
</article>

<article id="q5" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">Will you access my photos or data?</h3>
<div class="answer">No — we respect your privacy and only test repair functions.</div>
</article>

<article id="q6" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">What parts do you use?</h3>
<div class="answer">We use premium quality parts with warranty.</div>
</article>

<article id="q7" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">Do I need an appointment?</h3>
<div class="answer">Walk-ins welcome, booking ensures priority.</div>
</article>

<article id="q8" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">Is there a diagnostic fee?</h3>
<div class="answer">Basic checks are usually free.</div>
</article>

<article id="q9" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">How long do repairs take?</h3>
<div class="answer">Most repairs are same day.</div>
</article>

<article id="q10" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">What warranty do I get?</h3>
<div class="answer">Most repairs include parts & labour warranty.</div>
</article>

<article id="q11" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">Will True Tone / Face ID / Touch ID be affected?</h3>
<div class="answer">We take every precaution to preserve these features. Some functions are hardware-paired to the original part — we'll advise you before proceeding.</div>
</article>

<article id="q12" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">Do I need to back up my phone first?</h3>
<div class="answer">We recommend backing up before any repair, especially for water damage or motherboard-level work, just to be safe.</div>
</article>

<article id="q13" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">After-repair care tips</h3>
<div class="answer">Use a good case and screen protector, avoid extreme temperatures, and don't expose your device to moisture unnecessarily after a repair.</div>
</article>

<article id="q14" class="faq-card p-3 p-md-4 shadow-sm">
<h3 class="fw-semibold">Why can a quote change after inspection?</h3>
<div class="answer">Sometimes hidden damage is only discovered once the device is opened. We'll always inform you of any changes before proceeding.</div>
</article>

</div>
</div>
</div>
</div>

</section>
</div>

<script>
(function(){
const links = Array.from(document.querySelectorAll('#faqMenu a'));
const sections = links.map(a=>document.querySelector(a.getAttribute('href'))).filter(Boolean);
function setActive(id){
    links.forEach(a=>{ a.classList.toggle('active', a.getAttribute('href')==='#'+id); });
}
const io = new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{ if(entry.isIntersecting){ setActive(entry.target.id); } });
},{rootMargin:'0px 0px -70% 0px',threshold:0.1});
sections.forEach(sec=>io.observe(sec));
})();
</script>

@include('frontend.sections.footer')

@endsection