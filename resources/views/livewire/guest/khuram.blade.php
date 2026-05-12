<div>
    
     @php
    // Prefer new singleton table
    try {
        $gr = \App\Models\GoogleReviewsSetting::getSingleton();
        $rating      = isset($gr->rating)        ? (float) $gr->rating        : null;
        $reviewCount = isset($gr->reviews_count) ? (int)   $gr->reviews_count : null;
        $reviewUrl   = !empty($gr->review_url)   ?          $gr->review_url    : null;
    } catch (\Throwable $e) {
        $rating = $reviewCount = $reviewUrl = null;
    }

    // Fallback to old site_settings if new row missing
    if ($rating === null || $reviewCount === null || $reviewUrl === null) {
        $settings    = \App\Models\SiteSetting::getSiteSettings();
        $rating      = $rating      ?? (isset($settings->google_rating) ? (float) $settings->google_rating : 5.0);
        $reviewCount = $reviewCount ?? (
            isset($settings->google_reviews_count) ? (int)$settings->google_reviews_count
              : (isset($settings->google_review_count) ? (int)$settings->google_review_count : 0)
        );
        $reviewUrl   = $reviewUrl   ?? (!empty($settings->google_review_url) ? $settings->google_review_url : '#');
    }

    // ⭐ compute stars (clamp 0..5, round to 0.5)
    $clamped = max(0, min(5, (float) $rating));
    $rounded = round($clamped * 2) / 2.0;
    $full    = (int) floor($rounded);
    $half    = (($rounded - $full) >= 0.5) ? 1 : 0;
    $empty   = 5 - $full - $half;
  @endphp 
  
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

    <div>
        <!-- --------------------------top bar----------------- -->
        <livewire:components.top-bar />
        <!-- --------------------navbar--------------------- -->
        <div>
            <livewire:components.mega-nav />
        </div>

        <!-- --------------search filter-------- -->
        <br/><br/>
        <div class="container">
            <div class="row">
                <div class="d-flex my-3 align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-4">
                        <form class="d-flex" role="search">
                            <div class="wrapper">
                                <div class="search_box g-0">
                                    <div class="d-flex gap-2">
                                        {{-- Category dropdown (dynamic) --}}
                                        <div class="dropdown">
                                            <div class="custom-select-container">
                                                <select
                                                    class="form-control categories-k custom-border-select bg-danger w-75 text-white fs-5 custom-select"
                                                    wire:model="selectedCategoryId"
                                                    style="margin-left: 58px; text-align: center; line-height: 39px;"
                                                >
                                                    <option class="text-center font-weight-bold bg-white text-black" value="all">
                                                        All
                                                    </option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}" class="bg-white text-black">
                                                            {{ $cat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Search input --}}
                                        <div style="position: relative; display: inline-block;">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Search"
                                                wire:model.debounce.500="search"
                                                style="width: 500px; height: 51px;"
                                            >
                                            <img
                                                src="https://icons.veryicon.com/png/o/miscellaneous/prototyping-tool/search-bar-01.png"
                                                width="30"
                                                height="30"
                                                alt="Search Icon"
                                                style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%);"
                                            >
                                        </div>

                                        <img class="bi" src="" alt="">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- devices placeholder (currently dynamic list below) --}}
        <div class="d-flex flex-wrap justify-content-center mb-4">
        </div>

        <section class="container">
            <div class="row">
                {{-- Sidebar filters --}}
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end">
                        <a class="text-primary cursor-pointer" wire:click="clearFilter">Clear Filter</a>
                    </div>

                    {{-- Categories (dynamic) --}}
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> Categories </h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="category"
                                    value="all"
                                    wire:model="selectedCategoryId"
                                    id="cat-all"
                                >
                                <label class="form-check-label" for="cat-all">
                                    All
                                </label>
                            </div>

                            @foreach($categories as $cat)
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="category"
                                        value="{{ $cat->id }}"
                                        wire:model="selectedCategoryId"
                                        id="cat-{{ $cat->id }}"
                                    >
                                    <label class="form-check-label" for="cat-{{ $cat->id }}">
                                        {{ $cat->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Kind = Device Types (dynamic) --}}
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> Kind</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="device"
                                    value="all"
                                    wire:model="selectedDeviceId"
                                    id="device-all"
                                >
                                <label class="form-check-label" for="device-all">
                                    All
                                </label><br/>
                            </div>

                            @foreach($devices as $device)
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="device"
                                        value="{{ $device->id }}"
                                        wire:model="selectedDeviceId"
                                        id="device-{{ $device->id }}"
                                    >
                                    <label class="form-check-label" for="device-{{ $device->id }}">
                                        {{ $device->name }}
                                    </label><br/>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Type (still static, update later if needed) --}}
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> Type</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="">
                                <label class="form-check-label">
                                    Galaxy S23 Ultra (8)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="">
                                <label class="form-check-label">
                                    Galaxy S23 Plus (4)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="">
                                <label class="form-check-label">
                                    Galaxy S23 (9)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="">
                                <label class="form-check-label">
                                    Galaxy Z Fold5 (10)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="">
                                <label class="form-check-label">
                                    Galaxy Z Flip5 (41)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="">
                                <label class="form-check-label">
                                    Galaxy A54 5G (75)
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Variant (static) --}}
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> Variant</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="variant" value="">
                                <label class="form-check-label">
                                    Show All (82)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="variant" value="">
                                <label class="form-check-label">
                                    Bumper Cases (5)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="variant" value="">
                                <label class="form-check-label">
                                    Carbon Cases (2)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="variant" value="">
                                <label class="form-check-label">
                                    Card Slot Cases (4)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="variant" value="">
                                <label class="form-check-label">
                                    Clear Cases (11)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="variant" value="">
                                <label class="form-check-label">
                                    Designer Cases (6)
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Manufacturer (static for now) --}}
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> Manufacturer</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="grade" value="">
                                <label class="form-check-label">
                                    Baseus
                                </label><br/>
                                <input class="form-check-input" type="radio" name="grade" value="">
                                <label class="form-check-label">
                                    Huawei
                                </label><br/>
                                <input class="form-check-input" type="radio" name="grade" value="">
                                <label class="form-check-label">
                                    iOttie
                                </label><br/>
                                <input class="form-check-input" type="radio" name="grade" value="">
                                <label class="form-check-label">
                                    Mophie
                                </label><br/>
                                <input class="form-check-input" type="radio" name="grade" value="">
                                <label class="form-check-label">
                                    Olixar
                                </label><br/>
                                <input class="form-check-input" type="radio" name="grade" value="">
                                <label class="form-check-label">
                                    Pama
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Color (dynamic) --}}
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> Color</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="radio"
                                       name="color"
                                       value="all"
                                       wire:model="selectedColor"
                                       id="color-all">
                                <label class="form-check-label" for="color-all">
                                    All
                                </label><br/>
                            </div>

                            @foreach($colors as $color)
                                @php
                                    $colorId = 'color-' . strtolower(str_replace(' ', '-', $color));
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="color"
                                           value="{{ $color }}"
                                           wire:model="selectedColor"
                                           id="{{ $colorId }}">
                                    <label class="form-check-label" for="{{ $colorId }}">
                                        {{ $color }}
                                    </label><br/>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- PRICE (bind to Livewire) --}}
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> PRICE</h3><br/>
                        <div class="d-flex">
                            <div class="wrapper">
                                <header></header>

                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range"
                                           class="range-min"
                                           min="0"
                                           max="{{ $maxPrice ?: 1000 }}"
                                           step="1"
                                           wire:model.lazy="minPrice"
                                           style="border: 0px solid white !important;">
                                    <input type="range"
                                           class="range-max"
                                           min="0"
                                           max="{{ $maxPrice ?: 1000 }}"
                                           step="1"
                                           wire:model.lazy="maxPrice"
                                           style="border: 0px solid white !important;">
                                </div>
                                <div class="price-input">
                                    <div class="field">
                                        <span>Min</span>
                                        <input type="number"
                                               class="input-min"
                                               wire:model.lazy="minPrice">
                                    </div>
                                    <div class="separator">-</div>
                                    <div class="field">
                                        <span>Max</span>
                                        <input type="number"
                                               class="input-max"
                                               wire:model.lazy="maxPrice">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Ratings --}}
                    <div class="box card my-2">
                         <a class="review-banner-btn" href="{{ $reviewUrl }}" target="_blank" rel="noopener">
            <span>Review us</span>

            {{-- ⭐ dynamic stars + rating + count --}}
            <span class="banner-stars">
              <strong>{{ number_format($rounded, 1) }}</strong>
              @for($i=0; $i<$full; $i++)
                <i class="fa-solid fa-star"></i>
              @endfor
              @if($half)
                <i class="fa-solid fa-star-half-stroke"></i>
              @endif
              @for($i=0; $i<$empty; $i++)
                <i class="fa-regular fa-star"></i>
              @endfor
              <strong>{{ (int) $reviewCount }}</strong>
            </span>

             <span style="display:inline-flex; align-items:center; gap:6px;">
  <img src="https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png" 
       alt="Google" 
       class="google-icon me-2"
       style="width:48px; height:48px; object-fit:contain;">
  <span style="font-size:16px; font-weight:500; color:var(--color-text);">
    Google Reviews
  </span>
</span>

          </a>
                    </div>
                </div>

                {{-- Right side: dynamic product cards --}}
                <div class="col-lg-9 mt-4">
                    <div class="row">
                     {{--   <!--@forelse($products as $product)-->
                        <!--    @php-->
                        <!--        $img = $product->image;-->
                        <!--        if ($img && is_string($img) && substr($img, 0, 1) === '[') {-->
                        <!--            $arr = json_decode($img, true);-->
                        <!--            $img = $arr[0] ?? null;-->
                        <!--        }-->
                        <!--    @endphp-->

                        <!--    <div class="col-lg-4 col-md-6 mb-4">-->
                        <!--        <a href="{{ route('checkout', $product->id) }}">-->
                        <!--            <div class="card pt-1 align-items-center justify-content-center text-center">-->
                        <!--                <img src="{{ $img ?? 'https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png' }}"-->
                        <!--                     class="img-fluid p-3"-->
                        <!--                     style="height:172px;width:172px" />-->
                        <!--                <div class="card-body">-->
                        <!--                    <p>-->
                        <!--                        {{ $product->model->name ?? 'Accessory' }}-->
                        <!--                    </p>-->
                        <!--                    <div style="display: flex; justify-content:center; gap:10px;">-->
                        <!--                        <p class="fs-5">£{{ number_format($product->price, 2) }}</p>-->
                        <!--                    </div>-->
                        <!--                    <div style="display: flex; justify-content:center;">-->
                        <!--                        <p>-->
                        <!--                            <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360"-->
                        <!--                                 width="30"/>-->
                        <!--                            {{ $product->quantity }} In Stock-->
                        <!--                        </p>-->
                        <!--                    </div>-->
                        <!--                    @if($product->memory_size || $product->grade || $product->color)-->
                        <!--                        <small>-->
                        <!--                            {{ $product->memory_size }}-->
                        <!--                            @if($product->grade)-->
                        <!--                                | Grade {{ $product->grade }}-->
                        <!--                            @endif-->
                        <!--                            @if($product->color)-->
                        <!--                                | {{ $product->color }}-->
                        <!--                            @endif-->
                        <!--                        </small>-->
                        <!--                    @endif-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--@empty-->
                        <!--    <div class="col-12">-->
                        <!--        <p>No accessories found for this filter.</p>-->
                        <!--    </div>-->
                        <!--@endforelse-->  --}}
                        @forelse($products as $product)
    @php
        $img = $product->image;
        if ($img && is_string($img) && substr($img, 0, 1) === '[') {
            $arr = json_decode($img, true);
            $img = $arr[0] ?? null;
        }
    @endphp

    <div class="col-lg-4 col-md-6 mb-4">
        <a href="{{ url('/checkout/'.$product->id) }}">
            <div class="card pt-1 align-items-center justify-content-center text-center">
                <img src="{{ $img ?? 'https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png' }}"
                     class="img-fluid p-3"
                     style="height:172px;width:172px" />
                <div class="card-body">
                    <p>
                        {{ $product->model->name ?? 'Accessory' }}
                    </p>
                    <div style="display: flex; justify-content:center; gap:10px;">
                        <p class="fs-5">£{{ number_format($product->price, 2) }}</p>
                    </div>
                    <div style="display: flex; justify-content:center;">
                        <p>
                            <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360"
                                 width="30"/>
                            {{ $product->quantity }} In Stock
                        </p>
                    </div>
                    @if($product->memory_size || $product->grade || $product->color)
                        <small>
                            {{ $product->memory_size }}
                            @if($product->grade)
                                | Grade {{ $product->grade }}
                            @endif
                            @if($product->color)
                                | {{ $product->color }}
                            @endif
                        </small>
                    @endif
                </div>
            </div>
        </a>
    </div>
@empty
    <div class="col-12">
        <p>No accessories found for this filter.</p>
    </div>
@endforelse

                    </div>

                    <div class="mt-3">
                        {{ $products->links() }}
                    </div>
                </div>

            </div>
        </section>
    </div>

    <style>
        .sabscrib {
            background-color: dark;
            padding: 20px;
        }

        .container {
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .left {
            flex: 1;
        }

        .right {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .right {
                align-items: flex-start;
                margin-top: 0;
            }
        }
    </style>

    <style>
        .kh {
            font-weight: 900 !important;
        }

        @media (max-width: 767px) {
            h2.text-sm {
                font-size: 14px !important;
            }
            .card {
                min-width: 113px;
            }
            .img-fluid {
                max-width: 110% !important;
            }
        }
    </style>

    {{-- price slider JS (optional extra UI polish) --}}
    <script>
        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".slider .progress");
        let priceGap = 1000;

        priceInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });

        rangeInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if (maxVal - minVal < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });
    </script>
</div>
