<div>
    <livewire:components.mega-nav />
    <div class="container bg-gray rounded-4 p-5 mt-5 mb-5">

        <form wire:submit.prevent="sendCustomerEmail">

            <div class="row">

                <div class="container col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="brand">Brand:</label>
                        <input class="form-control" type="text" id="brand" wire:model="brand"
                            placeholder="Enter brand">
                        @error('brand')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="model">Model:</label>
                        <input class="form-control" type="text" id="model" wire:model="model"
                            placeholder="Enter model">
                        @error('model')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="additionalDescription">Additional Information:</label>
                        <textarea class="form-control" id="additionalDescription" wire:model="additionalDescription"
                            placeholder="Enter additional information"></textarea>
                        @error('additionalDescription')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="container col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="otherText">Additional Information:</label>
                        <textarea class="form-control" id="otherText" wire:model="otherText"
                            placeholder="Enter additional information"></textarea>
                        @error('otherText')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row mt-5">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="firstName">First Name:</label>
                        <input class="form-control" type="text" id="firstName"
                            wire:model="firstName" required placeholder="Enter your first name">
                        @error('firstName')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="lastName">Last Name:</label>
                        <input class="form-control" type="text" id="lastName"
                            wire:model="lastName" required placeholder="Enter your last name">
                        @error('lastName')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone:</label>
                        <input class="form-control" type="text" id="phone"
                            wire:model="phone" required placeholder="Enter your phone number">
                        @error('phone')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="email">Email:</label>
                        <input class="form-control" type="email" id="email"
                            wire:model="email" required placeholder="Enter your email">
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="productName">Confirm Email</label>
                        <input class="form-control" type="email" id="productName"
                            wire:model="productName" required placeholder="Confirm your email">
                        @error('productName')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center mt-5">
                <button class="btn text-white rounded-pill px-5 py-2"
                    style="background-color: #00BFFF;"
                    type="submit">
                    Ask For Quote
                </button>
            </div>

        </form>

        @if (session()->has('emailSent'))
            <div class="alert alert-success mt-3" role="alert">
                Email sent successfully!
            </div>
        @endif

        @if (session()->has('emailSendFailed'))
            <div class="alert alert-danger mt-3" role="alert">
                Email sending failed: {{ session('emailSendFailed') }}
            </div>
        @endif

    </div>
</div>