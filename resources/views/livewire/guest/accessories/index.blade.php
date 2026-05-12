<div>
    {{-- Top bar + Nav --}}
    <livewire:components.mega-nav />

    {{-- 1. Hero Banner --}}
    <div class="hero-banner py-4" style="background: linear-gradient(135deg, #bcebf7 0%, #f4f7ff 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span class="badge bg-white text-primary border px-3 py-2 mb-3 fw-bold shadow-sm">PREMIUM ACCESSORIES</span>
                    <h1 class="display-6 fw-bold mb-2" style="color: #0D1B2A; letter-spacing: -0.5px;">Everything you need.<br>All in one place.</h1>
                    <p class="text-muted mb-0">High-quality components curated for your devices.</p>
                </div>
                <div class="col-md-6 text-center d-none d-md-block">
                    <img src="https://ik.imagekit.io/8qyy56iye/ChatGPT_Image_Apr_21__2026__12_35_47_PM-removebg-preview.png" 
                         alt="Accessories" class="img-fluid floating-img" style="max-height: 220px;">
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            {{-- 2. Sidebar --}}
            <div class="col-lg-3 pe-lg-4 mb-4">
                <div class="sidebar-container">
                    
                    {{-- Categories Section --}}
                    <div class="filter-box border-0 mb-4">
                        <div class="filter-header d-none d-md-block">
                            <h6 class="sidebar-label">CATEGORIES</h6>
                        </div>
                        <div class="filter-body pt-0 pt-md-3">
                            {{-- Desktop View: List --}}
                            <div class="nav flex-column gap-1 d-none d-md-flex">
                                <button wire:click="$set('selectedCategoryId', 'All')" 
                                        class="nav-link-prof {{ $selectedCategoryId == 'All' ? 'active' : '' }}">
                                    All Accessories
                                </button>
                                @foreach($categories as $cat)
                                    <button wire:click="$set('selectedCategoryId', '{{ $cat->id }}')" 
                                            class="nav-link-prof {{ $selectedCategoryId == $cat->id ? 'active' : '' }}">
                                        {{ $cat->name }}
                                    </button>
                                @endforeach
                            </div>

                            {{-- Mobile View: 3 Icons Per Row (Lucide Icons) --}}
                            <div class="category-mobile-grid d-flex d-md-none flex-wrap">
                                <div class="category-mobile-item text-center" wire:click="$set('selectedCategoryId', 'All')">
                                    <div class="category-icon-circle {{ $selectedCategoryId == 'All' ? 'active' : '' }}">
                                        <i data-lucide="layout-grid" class="lucide-icon"></i>
                                    </div>
                                    <span class="category-name-label {{ $selectedCategoryId == 'All' ? 'fw-bold text-primary' : '' }}">All</span>
                                </div>
                                @foreach($categories as $cat)
                                    <div class="category-mobile-item text-center" wire:click="$set('selectedCategoryId', '{{ $cat->id }}')">
                                        <div class="category-icon-circle {{ $selectedCategoryId == $cat->id ? 'active' : '' }}">
                                            @php
                                                $icon = 'package'; 
                                                $name = strtolower($cat->name);
                                                if(str_contains($name, 'case')) $icon = 'smartphone';
                                                elseif(str_contains($name, 'charger') || str_contains($name, 'power')) $icon = 'zap';
                                                elseif(str_contains($name, 'audio') || str_contains($name, 'headphone')) $icon = 'headphones';
                                                elseif(str_contains($name, 'watch')) $icon = 'watch';
                                                elseif(str_contains($name, 'cable') || str_contains($name, 'usb')) $icon = 'usb';
                                                elseif(str_contains($name, 'screen') || str_contains($name, 'glass')) $icon = 'shield-check';
                                                elseif(str_contains($name, 'holder') || str_contains($name, 'stand')) $icon = 'grip-vertical';
                                            @endphp
                                            <i data-lucide="{{ $icon }}" class="lucide-icon"></i> 
                                        </div>
                                        <span class="category-name-label {{ $selectedCategoryId == $cat->id ? 'fw-bold text-primary' : '' }}">{{ $cat->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Device Type Section --}}
                    <div class="filter-box border-0">
                        <div class="filter-header">
                            <h6 class="sidebar-label">DEVICE TYPE</h6>
                        </div>
                        <div class="filter-body">
                            {{-- Updated Desktop View: Flex Wrap for Rows --}}
                            <div class="device-tag-container d-none d-md-flex flex-wrap gap-2">
                                @forelse($devices as $device)
                                    <button type="button" 
                                        class="device-tag {{ $selectedDevice && $selectedDevice->id === $device->id ? 'active' : '' }}" 
                                        wire:click="selectDevice({{ $device->id }})">
                                        {{ $device->name }}
                                    </button>
                                @empty
                                    <p class="text-muted small px-2">No devices listed.</p>
                                @endforelse
                            </div>

                            <div class="d-block d-md-none">
                                <select class="form-select form-select-sm" wire:change="selectDevice($event.target.value)">
                                    <option value="">All Devices</option>
                                    @foreach($devices as $device)
                                        <option value="{{ $device->id }}" {{ $selectedDevice && $selectedDevice->id === $device->id ? 'selected' : '' }}>
                                            {{ $device->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. Card Section --}}
            <div class="col-lg-9">
                <div class="row align-items-center mb-4 g-3">
                    <div class="col-md-7 text-start">
                        <h2 class="h5 mb-0 fw-bold text-dark">All Accessories</h2>
                        <p class="text-muted x-small mb-0">Explore our wide range of premium accessories.</p>
                    </div>
                    <div class="col-md-5">
                        <div class="search-container">
                            <i class="fa fa-search search-icon"></i>
                            <input type="text" 
                                   class="form-control search-input" 
                                   placeholder="Search models..." 
                                   wire:model.debounce.500ms="search">
                        </div>
                    </div>
                </div>

                <div class="row g-2 g-md-3">
                    @forelse($models as $model)
                        <div class="col-6 col-md-6 col-xl-4">
                            <div class="card product-card-compact h-100 border-0 shadow-sm">
                                <div class="card-img-top-white">
                                    <img src="{{ $model->file ?? 'https://via.placeholder.com/300x300?text=Product' }}" 
                                         alt="{{ $model->name }}">
                                </div>
                                <div class="card-body p-2 p-md-3 d-flex flex-column">
                                    <span class="category-pill">{{ $model->device_type->name ?? 'Universal' }}</span>
                                    <h6 class="product-title-text">{{ $model->name }}</h6>
                                    <div class="mt-auto d-flex gap-1 gap-md-2 pt-2">
                                        <a href="{{ route('guest-accessories-product-specs', [
                                            'category_slug' => $model->device_type?->category?->slug ?? 'accessory',
                                            'device_slug'   => $model->device_type?->slug ?? 'device',
                                            'model_slug'    => $model->slug ?? $model->id,
                                        ]) }}" class="btn-icon-cart-alt">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <a href="{{ route('guest-accessories-product-specs', [
                                            'category_slug' => $model->device_type?->category?->slug ?? 'accessory',
                                            'device_slug'   => $model->device_type?->slug ?? 'device',
                                            'model_slug'    => $model->slug ?? $model->id,
                                        ]) }}" class="btn-details-primary">
                                            <span class="d-none d-sm-inline">Details</span>
                                            <span class="d-inline d-sm-none">View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 py-5 text-center bg-light rounded-4">
                            <i class="fa fa-search fa-2x text-muted mb-3"></i>
                            <h6 class="fw-bold">No results found</h6>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Lucide Icons Loader --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();
</script>

<style>
    :root {
        --primary: #0084D1;
        --dark-navy: #0D1B2A;
    }

    /* Lucide Icon Sizing */
    .lucide-icon {
        width: 20px;
        height: 20px;
        stroke-width: 2px;
    }

    /* Mobile Category Grid */
    .category-mobile-grid { margin: 0 -5px; }
    .category-mobile-item { width: 33.33%; padding: 8px 5px; cursor: pointer; }
    .category-name-label {
        display: block; font-size: 0.68rem; font-weight: 600; color: #475569;
        margin-top: 6px; line-height: 1.2;
    }

    .category-icon-circle {
        width: 46px; height: 46px; background: #f8fafc; border: 1px solid #e2e8f0;
        border-radius: 12px; display: flex; align-items: center; justify-content: center;
        margin: 0 auto; color: #64748b; transition: all 0.2s ease;
    }

    .category-icon-circle.active {
        background: var(--primary); color: white; border-color: var(--primary);
        box-shadow: 0 4px 8px rgba(0, 132, 209, 0.2);
    }

    /* Sidebar */
    .filter-box { background: #ffffff; border-radius: 12px; }
    .filter-header { background: #0882fc; padding: 10px 16px; border-radius: 8px; }
    .sidebar-label { font-size: 0.65rem; font-weight: 800; letter-spacing: 1px; color: white; margin: 0; }
    .filter-body { padding: 12px 0; }

    .nav-link-prof {
        background: transparent; border: none; text-align: left; padding: 8px 12px;
        font-weight: 500; color: #475569; font-size: 0.85rem; border-radius: 8px; width: 100%;
    }
    .nav-link-prof.active { background-color: #eef8ff; color: var(--primary); font-weight: 700; }

    /* Cards (2 per row on mobile) */
    .product-card-compact { background: #ffffff; border-radius: 10px; }
    .card-img-top-white {
        background: #ffffff; height: 130px; padding: 12px;
        display: flex; align-items: center; justify-content: center;
    }
    @media (min-width: 768px) { .card-img-top-white { height: 180px; } }
    .card-img-top-white img { max-height: 100%; max-width: 100%; object-fit: contain; }

    .product-title-text {
        font-size: 0.78rem; font-weight: 700; color: var(--dark-navy); line-height: 1.3;
        height: 2.1rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
    }
    @media (min-width: 768px) { .product-title-text { font-size: 0.95rem; height: 2.7rem; } }

    .category-pill { font-size: 0.6rem; font-weight: 800; color: var(--primary); text-transform: uppercase; }

    /* Search */
    .search-container { position: relative; }
    .search-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
    .search-input { padding-left: 40px !important; border-radius: 10px; font-size: 0.85rem; height: 45px; border: 1px solid #e2e8f0; }

    /* Buttons */
    .btn-details-primary {
        flex-grow: 1; background: var(--primary); color: white; font-weight: 700;
        font-size: 0.7rem; border-radius: 6px; text-decoration: none;
        display: flex; align-items: center; justify-content: center;
    }
    .btn-icon-cart-alt {
        background: white; color: var(--primary); border: 1px solid var(--primary);
        width: 32px; height: 32px; border-radius: 6px; display: flex;
        align-items: center; justify-content: center; text-decoration: none;
    }

    .device-tag {
        background: #f8fafc; border: 1px solid #e2e8f0; padding: 5px 10px;
        border-radius: 6px; font-size: 0.7rem; font-weight: 600; color: #64748b;
        transition: all 0.2s ease;
    }
    .device-tag:hover { border-color: var(--primary); color: var(--primary); }
    .device-tag.active { background: var(--primary); color: white; border-color: var(--primary); }

    /* Ensure desktop container wraps items */
    .device-tag-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        padding: 5px;
    }

    .x-small { font-size: 0.75rem; }
    .floating-img { animation: float 5s ease-in-out infinite; }
    @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-5px); } }
</style>