<div>
<style>
   .form-box {
    max-width: 600px;
}

.custom-input {
    height: 50px;
    border-radius: 6px;
}

textarea.form-control {
    border-radius: 6px;
}

.custom-btn {
    background-color: black;
    color: white;
    padding: 10px 30px;
    border-radius: 6px;
    font-weight: 600;
    border: none;
}

.custom-btn:hover {
    background-color: black;
    color: white;
    opacity: 1;
    transform: none;
}

@media (max-width: 576px) {
    .custom-btn {
        width: 100%;
    }
}

</style>
<div class="form-box container mt-4">
    <h3 class="mb-3">Contact Us</h3>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="sendEmail">
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" class="form-control custom-input"
                    wire:model="name" placeholder="Name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <input type="tel" class="form-control custom-input"
                    wire:model="phone" placeholder="Phone">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-3">
            <input type="email" class="form-control custom-input"
                wire:model="email" placeholder="Email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <select class="form-select custom-input" wire:model="selectedOption">
                <option value="">Subject</option>
                <option value="Buying a Device">Buying a Device</option>
                <option value="Selling A Device">Selling A Device</option>
                <option value="Repairing A device">Repairing A device</option>
                <option value="Other">Other</option>
            </select>
            @error('selectedOption') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        @if($selectedOption == 'Other')
        <div class="mb-3">
            <input type="text" class="form-control"
                wire:model="otherOption" placeholder="Other Option">
            @error('otherOption') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        @endif
        
        <div class="mb-3">
            <textarea rows="5" class="form-control"
                wire:model="message" placeholder="Type Your Message"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn custom-btn">
                Submit
            </button>
        </div>

    </form>
</div>
</div>