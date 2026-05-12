<div>
    <div>
        <h3>{{ $model->name ?? '' }}
            @if($product_spec)
                ({{ $product_spec->memory_size ?? $product_spec->spec_category ?? '' }})
            @endif
        </h3>

        <div class="d-flex justify-content-center my-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link cursor-pointer {{ $editor == 'Detail' ? 'active text-success' : '' }}"
                       wire:click="toggleEditor('Detail')">
                        Details
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cursor-pointer {{ $editor == 'Specification' ? 'active text-success' : '' }}"
                       wire:click="toggleEditor('Specification')">
                        Specification
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cursor-pointer {{ $editor == 'Warranty' ? 'active text-success' : '' }}"
                       wire:click="toggleEditor('Warranty')">
                        Warranty
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h4>Enter {{ $editor }}</h4>

            <div>
                <div wire:ignore>
                    <textarea id="editor"></textarea>
                </div>

                <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
                <script>
                    let editorInstance = null;

                    function createEditor() {
                        if (editorInstance) {
                            editorInstance.destroy().then(() => {
                                initializeNewEditor();
                            });
                        } else {
                            initializeNewEditor();
                        }
                    }

                    function initializeNewEditor() {
                        ClassicEditor
                            .create(document.querySelector('#editor'))
                            .then(editor => {
                                editorInstance = editor;

                                // jab bhi ckeditor ka data change ho, Livewire ko bhejo
                                editor.model.document.on('change:data', () => {
                                    @this.set('content', editor.getData());
                                });

                                // initial content set karo
                                editor.setData(@this.get('content') ?? '');
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    }

                    // har tab change ya product load par yeh event fire hota hai
                    document.addEventListener('livewire:load', () => {
                        Livewire.on('editorTypeChanged', () => {
                            if (editorInstance) {
                                editorInstance.setData(@this.get('content') ?? '');
                            } else {
                                createEditor();
                            }
                        });
                    });
                </script>
            </div>

            {{-- validation errors (ab mostly nahi aayenge kyunki nullable hai, phir bhi rakh liye) --}}
            @error('detail')
                <span class="text-xs text-danger d-block">{{ $message }}</span>
            @enderror
            @error('specification')
                <span class="text-xs text-danger d-block">{{ $message }}</span>
            @enderror
            @error('warranty')
                <span class="text-xs text-danger d-block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="float-end mt-3">
        <button type="button" class="bg-blue text-white" wire:click="save">
            Save Changes
            <span wire:loading wire:target="save">
                <x-spinner />
            </span>
        </button>
    </div>
</div>
