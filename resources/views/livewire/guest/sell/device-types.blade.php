<div>
    <livewire:components.top-bar />
    <livewire:components.mega-nav />

    <section class="head-sell">
        <div class="container"></div>
    </section>

    <section class="head-sell mt-5">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 p-3 mt-5">
                    <h1 style="font-family: heading;">{!! $webContent->brand_page_heading_1 !!}</h1>
                    <p style="text-align: justify;">
                        At {{ $siteSettings->buisness_name ?? '' }}, we've streamlined the process of selling your device, ensuring it's as effortless as can be.
                        Trust {{ $siteSettings->buisness_name ?? '' }} for a seamless, hassle-free journey in selling your phone or tablet.
                        {!! $webContent->brand_page_heading_2 !!}
                    </p>
                </div>
                <div class="col-lg-6 p-3">
                    <img src="https://ik.imagekit.io/p2slevyg1/Best_Smartphones_US_2022-scaled.jpg?updatedAt=1698830519194" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row row-cols-md-4 row-cols-lg-7 justify-content-center">
                @forelse($devices as $key => $device)
                <div class="col mb-4">
                    {{-- ✅ SEO URL: /sell/phones/apple --}}
                    <a href="{{ route('guest-sell-models', [
                        'category_slug' => $category->slug ?? \Illuminate\Support\Str::slug($category->name),
                        'device_slug'   => $device->slug ?? \Illuminate\Support\Str::slug($device->name),
                    ]) }}">
                        <div class="card shadow-sm p-3 mb-5 rounded cursor-pointer d-flex justify-content-center align-items-center">
                            <img src="{{ $device->file ?? '' }}" class="img-fluid" style="max-height:120px; max-width:140px;">
                        </div>
                    </a>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>

    <div class="container border rounded p-3 my-3">
        <h2 class="fw-bold">{!! $webContent->brand_page_heading_3 !!}</h2>
        <p>{{ $siteSettings->buisness_name ?? '' }} {!! $webContent->brand_page_heading_4 !!}.</p>
    </div>
</div>