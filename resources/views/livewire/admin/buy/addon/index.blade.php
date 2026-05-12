<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="buy" />
        <x-content>
            <livewire:admin.buy.components.top-nav active="add-ons" />
            <div class="container my-4">

                @if(session('image_saved'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('image_saved') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="text-center mb-3">
                    <strong>Select category, device and model to see product specifications with prices.</strong>
                </div>

                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select class="form-select" wire:model="selectedCatId">
                            @forelse($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select class="form-select" wire:model="selectedDeviceId">
                            <option value="null">Select device</option>
                            @forelse($devices as $device)
                            <option value="{{ $device->id }}">{{ $device->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select class="form-select" wire:model="selectedModelId">
                            @if ($selectedDeviceId)
                            <option value="null">Select model</option>
                            @forelse($models as $model)
                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                            @empty
                            @endforelse
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3 d-flex justify-content-center">
                        <button class="btn p-3" onclick="showM('add-model-spec')" style="border-radius: 20px; color: white; background-color: #20375E; padding: 10px">
                            Create New
                        </button>
                    </div>
                </div>

                <div>
                    <div style="overflow-x: auto;">
                        <table class="table p-5">
                            <thead>
                                <tr style="background-color: rgb(192, 192, 239);">
                                    <th style="background-color: rgb(192, 192, 239);">#</th>
                                    <th style="background-color: rgb(192, 192, 239);">Image</th>
                                    <th style="background-color: rgb(192, 192, 239);">Memory Size</th>
                                    <th style="background-color: rgb(192, 192, 239);">Grade</th>
                                    <th style="background-color: rgb(192, 192, 239);">Color</th>
                                    <th style="background-color: rgb(192, 192, 239);">Condition</th>
                                    <th style="background-color: rgb(192, 192, 239);">Price</th>
                                    <th style="background-color: rgb(192, 192, 239);">Quantity</th>
                                    <th style="background-color: rgb(192, 192, 239);">IMEI</th>
                                    <th style="background-color: rgb(192, 192, 239);">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($product_specs as $key => $product)

                                <tr>
                                    <th>{{ ++$key }}</th>

                                    <td style="min-width: 140px;">
                                        @php
                                            $productImages = json_decode($product->image, true);
                                        @endphp
                                        @if(is_array($productImages) && count($productImages) > 0)
                                            <div class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach ($productImages as $index => $image)
                                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }} text-center">
                                                        <img src="{{ $image }}" class="img-fluid"
                                                             style="max-height: 50px;"
                                                             onerror="this.src='https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png'">
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @elseif(!empty($product->image))
                                            <img src="{{ $product->image }}"
                                                 class="img-fluid" style="max-height: 50px;"
                                                 onerror="this.src='https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png'">
                                        @else
                                            <img src="https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png"
                                                 class="img-fluid" style="max-height: 50px;">
                                        @endif
                                    </td>

                                    @if ($editableProductSpecId == $product->id)
                                    <td><input style="width:90px; height:30px;" type="text" wire:model.debounce.500="memory_size_edit" placeholder="Memory Size" /></td>
                                    @else
                                    <td>{{ $product->memory_size ?? '....' }}</td>
                                    @endif

                                    @if ($editableProductSpecId == $product->id)
                                    <td>
                                        <select style="height:30px; font-size:13px;" wire:model="grade_edit">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="A+">A+</option>
                                        </select>
                                    </td>
                                    @else
                                    <td>{{ $product->grade }}</td>
                                    @endif

                                    @if ($editableProductSpecId == $product->id)
                                    <td><input style="width:80px; height:30px;" type="text" wire:model.debounce.500="color_edit" placeholder="Color" /></td>
                                    @else
                                    <td>{{ $product->color }}</td>
                                    @endif

                                    @if ($editableProductSpecId == $product->id)
                                    <td>
                                        <select style="height:30px; font-size:13px;" wire:model="condition_edit">
                                            <option value="">-- Select --</option>
                                            <option value="Brand-new">Brand-new</option>
                                            <option value="Excellent">Excellent</option>
                                            <option value="Good">Good</option>
                                            <option value="Fair">Fair</option>
                                            <option value="Poor">Poor</option>
                                            <option value="Faulty">Faulty</option>
                                        </select>
                                    </td>
                                    @else
                                    <td>{{ $product->condition ?? '—' }}</td>
                                    @endif

                                    @if ($editableProductSpecId == $product->id)
                                    <td>
                                        <input style="width:60px; height:30px;" type="text"
                                               wire:keydown.enter="updateProductPrice('{{ $product->id }}')"
                                               wire:model.debounce.500="price"
                                               id="{{ $product->id }}" />
                                    </td>
                                    @else
                                    <td wire:click="toggleEditable('{{ $product->id }}')">£ {{ $product->price }}</td>
                                    @endif

                                    @if ($editableProductSpecId == $product->id)
                                    <td>
                                        <table>
                                            <tr>
                                                <th>Quantity</th>
                                                <td><input type="number" wire:model.debounce.500="quantity" style="width:60px;" /></td>
                                            </tr>
                                            @if($selectedCatId == 14)
                                            <tr>
                                                <th>IMEI</th>
                                                <td>
                                                    @for($i = 0; $i < $quantity; $i++)
                                                    <input class="mt-1" type="text"
                                                           wire:model.debounce.500="imei.{{ $i }}"
                                                           placeholder="IMEI {{ $i + 1 }}"
                                                           oninput="validateIMEIs()" />
                                                    @endfor
                                                    <div wire:ignore>
                                                        <div id="imeisError" class="text-danger"></div>
                                                        <div id="imeisCount"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td colspan="2">
                                                    <div class="d-flex gap-2 cursor-pointer align-items-center"
                                                         wire:click="updateProductQuantity('{{ $product->id }}')">
                                                        <i class="fa fa-plus text-success" style="font-size:20px;" aria-hidden="true"></i>
                                                        <h4 class="fw-bold">Add Quantity</h4>
                                                        <span wire:loading wire:target="updateProductQuantity">saving....</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    @else
                                    <td>{{ $product->quantity }} <span class="btn btn-success" wire:click="toggleEditable('{{ $product->id }}')">+</span></td>
                                    @endif

                                    <td>
                                        @if ($product->imei)
                                            @php $imeiList = json_decode($product->imei, true); @endphp
                                            @if (is_array($imeiList) && count($imeiList) >= 1)
                                            <select>
                                                @foreach ($imeiList as $pimei)
                                                <option>{{ $pimei['status'] ?? $pimei->status ?? '' }} : {{ $pimei['imei'] ?? $pimei->imei ?? '' }}</option>
                                                @endforeach
                                            </select>
                                            @else
                                            No IMEI available
                                            @endif
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true"
                                           wire:click="delete('{{ $product->id }}')"></i>
                                        <span class="mx-2"></span>
                                        <i class="fa fa-camera cursor-pointer text-primary me-2" aria-hidden="true"
                                           title="Edit Images"
                                           wire:click="toggleImageEdit('{{ $product->id }}')"></i>
                                        <i class="fa fa-ellipsis-v cursor-pointer" aria-hidden="true"
                                           wire:click="editOrUpdateSpec('{{ $product->id }}')"></i>
                                    </td>
                                </tr>

                                @if ($imageEditProductId == $product->id)
                                <tr style="background-color: #f0f4ff;">
                                    <td colspan="10">
                                        <div class="p-3">

                                            <h6 class="fw-bold mb-3" style="color: #20375E;">
                                                <i class="fa fa-image me-2"></i>
                                                Edit Images
                                                <small class="text-muted fw-normal" style="font-size:12px;">
                                                    (Remove existing or upload new, then Save)
                                                </small>
                                            </h6>

                                            <div class="row">

                                                <div class="col-md-6 mb-3">
                                                    <p class="fw-semibold mb-2" style="font-size:13px;">Current Images</p>
                                                    @if (!empty($existing_images))
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach ($existing_images as $idx => $imgUrl)
                                                            <div class="position-relative" style="display:inline-block;">
                                                                <img src="{{ $imgUrl }}"
                                                                     style="width:75px; height:75px; object-fit:cover; border:2px solid #aaa; border-radius:8px;"
                                                                     onerror="this.src='https://via.placeholder.com/75x75?text=Error'">
                                                                <button type="button"
                                                                        wire:click="removeExistingImage({{ $idx }})"
                                                                        style="position:absolute; top:-8px; right:-8px; background:red; color:white; border:none; border-radius:50%; width:22px; height:22px; font-size:14px; line-height:1; cursor:pointer;">
                                                                    &times;
                                                                </button>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <p class="text-muted" style="font-size:12px;">No images currently.</p>
                                                    @endif
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <p class="fw-semibold mb-2" style="font-size:13px;">Add New Images</p>

                                                    <div wire:ignore>
                                                        <input type="file"
                                                               id="imgInput_{{ $product->id }}"
                                                               multiple
                                                               accept="image/jpeg,image/png,image/webp,image/gif"
                                                               class="form-control form-control-sm"
                                                               style="max-width:300px;"
                                                               onchange="previewAndSendImages(this, '{{ $product->id }}')">
                                                    </div>

                                                    <div id="newImgPreview_{{ $product->id }}" class="d-flex flex-wrap gap-2 mt-2"></div>

                                                    @if (!empty($new_image_previews))
                                                    <small class="text-success d-block mt-1">
                                                        {{ count($new_image_previews) }} new image(s) ready to save
                                                    </small>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="d-flex gap-2 mt-1">
                                                <button type="button"
                                                        class="btn btn-sm px-4 text-white"
                                                        style="background-color:#20375E; border-radius:8px;"
                                                        wire:click="saveImages('{{ $product->id }}')">
                                                    <span wire:loading wire:target="saveImages">
                                                        <i class="fa fa-spinner fa-spin"></i> Saving...
                                                    </span>
                                                    <span wire:loading.remove wire:target="saveImages">
                                                        <i class="fa fa-save me-1"></i> Save Images
                                                    </span>
                                                </button>

                                                <button type="button"
                                                        class="btn btn-sm btn-outline-secondary px-4"
                                                        style="border-radius:8px;"
                                                        wire:click="cancelImageEdit">
                                                    Cancel
                                                </button>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                @endif

                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">Record Not Found!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-content>
    </div>

    @if ($selectedModel)
    <x-modal title="Add Specification" id="add-model-spec" size="xl">
        <livewire:admin.buy.addon.add-spec :model="$selectedModelId" />
    </x-modal>
    @endif

    @if ($selectedModel)
    <x-modal title="Add Specifications Detail" id="add-model-more-spec" size="xl">
        <livewire:admin.buy.addon.more-spec :model="$selectedModelId" />
    </x-modal>
    @endif

</div>

<script>
    function previewAndSendImages(input, productId) {
        const files = Array.from(input.files);
        if (!files.length) return;

        const previewArea = document.getElementById('newImgPreview_' + productId);
        previewArea.innerHTML = '';

        const promises = files.map(file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = e => {
                const wrapper = document.createElement('div');
                wrapper.innerHTML = `
                    <img src="${e.target.result}"
                         style="width:65px; height:65px; object-fit:cover; border:2px solid #20375E; border-radius:6px;"
                         title="${file.name}">`;
                previewArea.appendChild(wrapper);

                // Clean base64 - remove prefix
                const base64String = e.target.result.split(',')[1];

                resolve({
                    name: file.name,
                    type: file.type,
                    data: base64String
                });
            };
            reader.onerror = () => reject('Error reading file');
            reader.readAsDataURL(file);
        }));

        Promise.all(promises).then(filesData => {
            @this.call('receiveNewImages', filesData);
        }).catch(err => {
            console.error('Upload error:', err);
        });
    }

    function validateIMEIs() {
        const imeisInput = document.querySelectorAll('input[type="text"][placeholder^="IMEI"]');
        const imeisError = document.getElementById("imeisError");
        const imeisCount = document.getElementById("imeisCount");
        let isValid = true, errorMessage = "";

        imeisInput.forEach(input => {
            const imei = input.value.trim();
            if (imei.length !== 15 || isNaN(imei)) {
                isValid = false;
                errorMessage += "IMEI must be exactly 15 digits\n";
            } else if (!isValidIMEI(imei)) {
                isValid = false;
                errorMessage += "IMEI is not valid\n";
            }
        });

        imeisError.textContent = isValid ? "" : errorMessage;
        imeisCount.textContent = isValid ? "Valid IMEI" : "";
    }

    function isValidIMEI(imei) {
        imei = imei.replace(/[^0-9]/g, '');
        if (!/^\d{15}$/.test(imei)) return false;
        const rev = imei.split('').reverse().join('');
        let sum = 0;
        for (let i = 0; i < 15; i++) {
            let n = parseInt(rev[i]);
            if (i % 2 === 1) { n *= 2; if (n > 9) n -= 9; }
            sum += n;
        }
        return sum % 10 === 0;
    }
</script>