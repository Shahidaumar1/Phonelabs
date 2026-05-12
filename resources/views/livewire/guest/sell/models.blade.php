<div>
    <livewire:components.top-bar />
    <livewire:components.mega-nav />

    <div>
        <section class="head-sell">
            <div class="container"></div>
        </section>

        <div class="container">
            <section class="fech">
                <div class="container">

                    <div class="row align-items-center">
                        <div class="col-2 col-sm-1 myarrow">
                            {{-- ✅ Back button — SEO route --}}
                            <a href="{{ route('guest-sell-device-types', [
                                'category_slug' => $device->category->slug ?? \Illuminate\Support\Str::slug($device->category->name ?? 'phones'),
                            ]) }}">
                                <img src="https://ik.imagekit.io/b6iqka2sz/ali.png?updatedAt=1709054945643" alt="Back"
                                    class="img-fluid" style="max-width: 100%; height: auto;">
                            </a>
                        </div>
                        <div class="col-10 col-sm-11">
                            <div class="d-flex flex-wrap gap-2 p-3 rounded my-3 shadow-sm justify-content-center justify-content-md-start">
                                <h1 class="fw-bold text-dark text-center text-md-start my-3">
                                    Choose Model Of <span class="text-danger">{{ $device->name ?? '' }}</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <style>
                        .shah { transition: border-color 0.3s ease-in-out !important; height: 250px !important; }
                        .shah:hover { border-color: #dc3545 !important; box-shadow: 0 0 40px #dc3545 !important; cursor: pointer !important; }
                    </style>

                    <div class="container">

                        {{-- Search Bar --}}
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" id="modelSearch" class="form-control rounded-pill" placeholder="Search by Model Name">
                                        <button class="btn btn-outline-secondary rounded-pill" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            // ✅ Slugs ek baar yahan calculate karo — dono grids use karengi
                            $catSlugForModel = $device->category->slug
                                ?? \Illuminate\Support\Str::slug($device->category->name ?? 'phones');
                            $devSlugForModel = $device->slug
                                ?? \Illuminate\Support\Str::slug($device->name ?? 'device');
                        @endphp

                        {{-- Desktop Grid --}}
                        <div class="row row-cols-2 d-none d-md-flex d-lg-flex row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-1 gx-0 gy-2" id="modelContainer">
                            @forelse($models as $model)
                            <div class="col model-card">
                                <div class="card shah my-2 cursor-pointer align-items-center justify-content-center pt-2">
                                    {{-- ✅ SEO URL: /sell/phones/apple/iphone-15-pro-max --}}
                                    <a href="{{ route('guest-sell-model-detail', [
                                        'category_slug' => $catSlugForModel,
                                        'device_slug'   => $devSlugForModel,
                                        'model_slug'    => $model->slug ?? $model->id,
                                    ]) }}">
                                        <div class="card-body">
                                            <img src="{{ $model->file ?? '' }}" class="card-img-top img-fluid p-1" style="max-height:150px; max-width:150px;">
                                            <h6 class="card-title text-center text-lg-sm" style="font-size: 15px;">{{ $model->name }}</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @empty
                            <div class="col">
                                <span class="text-danger">Not Found</span>
                            </div>
                            @endforelse
                        </div>

                        {{-- Mobile Grid --}}
                        <div class="row row-cols-2 d-md-none d-lg-none row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-1 gx-0 gy-2">
                            @forelse($models as $model)
                            <div class="col model-card">
                                <div class="card my-2 cursor-pointer align-items-center justify-content-center pt-2">
                                    {{-- ✅ SEO URL: /sell/phones/apple/iphone-15-pro-max --}}
                                    <a href="{{ route('guest-sell-model-detail', [
                                        'category_slug' => $catSlugForModel,
                                        'device_slug'   => $devSlugForModel,
                                        'model_slug'    => $model->slug ?? $model->id,
                                    ]) }}">
                                        <img src="{{ $model->file ?? '' }}" class="card-img-top img-fluid p-1" style="max-height:150px; max-width:150px;">
                                    </a>
                                    <div class="card-body">
                                        <h6 class="card-title text-center text-lg-sm" style="font-size: 12px;">{{ $model->name }}</h6>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col">
                                <span class="text-danger">Not Found</span>
                            </div>
                            @endforelse
                        </div>

                    </div>

                    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
                    <script>
                        function searchModels() {
                            var input = document.getElementById('modelSearch');
                            var filter = input.value.toUpperCase();
                            var container = document.getElementById('modelContainer');
                            var modelCards = container.getElementsByClassName('model-card');
                            for (var i = 0; i < modelCards.length; i++) {
                                var modelName = modelCards[i].getElementsByClassName("card-title")[0];
                                if (modelName.innerText.toUpperCase().indexOf(filter) > -1) {
                                    modelCards[i].style.display = "";
                                } else {
                                    modelCards[i].style.display = "none";
                                }
                            }
                        }
                        document.getElementById('modelSearch').addEventListener('keyup', searchModels);
                    </script>

                </div>
            </section>

            <div class="container border rounded p-3 my-3">
                <h2 class="fw-bold">How do I sell my mobile phone?</h2>
                <p>{{ $siteSettings->buisness_name ?? '' }} has made selling your mobile phones surprisingly easy and
                    extremely fast. We know you'll be pleasantly surprised
                    with the brilliant prices we offer and we're absolutely sure you'll be amazed with the simplicity
                    and speed of our service.</p>
                <p>We're here to help you recycle your phone. Whether you want to sell your iPhone to upgrade to the
                    latest Apple smartphone or want to trade in an old Android device for the latest Samsung.</p>
            </div>
        </div>
    </div>
</div>