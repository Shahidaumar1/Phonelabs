
<div class="cust-container" style="max-width:600px;margin:60px auto">
  <livewire:components.top-bar />
    <livewire:components.mega-nav theme="white" />

    <h2 class="mb-4">Ask For Quotation</h2>

    {{-- ✅ Auto Selected Details --}}
    <div class="mb-4 p-3 border rounded bg-light">
        <p><strong>Device:</strong> {{ $device }}</p>
        <p><strong>Model:</strong> {{ $modal }}</p>
        <p><strong>Repair:</strong> {{ $repair }}</p>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="d-flex flex-column gap-3">

        <input type="text" wire:model.defer="name" class="form-control" placeholder="Your Name">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror

        <input type="email" wire:model.defer="email" class="form-control" placeholder="Email">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror

        <input type="text" wire:model.defer="phone" class="form-control" placeholder="Phone">
        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror

        <textarea wire:model.defer="message" class="form-control" placeholder="Message (optional)"></textarea>

       <button type="submit" class="btn fw-bold" style="background:#00aeef;color:#fff;border:none;height:56px;border-radius:12px;">
    Submit Quotation
</button>

    </form>
</div>
