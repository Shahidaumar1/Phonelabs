<div>
    <livewire:components.mega-nav theme="white" />

    <div class="cust-container" style="padding:40px 15px;">
        <h2 style="text-align:center;margin-bottom:10px;">
            Free Repair Booking
        </h2>

        <p style="text-align:center;margin-bottom:25px;">
            {{ $modal->name ?? '' }} — {{ $repairType->name ?? '' }}
        </p>

        @if (session()->has('success'))
            <div style="background:#d4edda;padding:12px;border-radius:10px;margin:0 auto 15px;max-width:650px;">
                {{ session('success') }}
            </div>
        @endif

        <!--<form wire:submit.prevent="submit" style="max-width:650px;margin:0 auto;">-->
        <form wire:submit.prevent="submit">

            <div style="margin-bottom:12px;">
                <label style="display:block;margin-bottom:6px;">Name</label>
                <input type="text" wire:model.defer="name" style="width:100%;height:46px;padding:10px;border:1px solid #ddd;border-radius:10px;">
                @error('name') <small style="color:red;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom:12px;">
                <label style="display:block;margin-bottom:6px;">Phone</label>
                <input type="text" wire:model.defer="phone" style="width:100%;height:46px;padding:10px;border:1px solid #ddd;border-radius:10px;">
                @error('phone') <small style="color:red;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom:12px;">
                <label style="display:block;margin-bottom:6px;">Email (optional)</label>
                <input type="email" wire:model.defer="email" style="width:100%;height:46px;padding:10px;border:1px solid #ddd;border-radius:10px;">
                @error('email') <small style="color:red;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom:12px;">
                <label style="display:block;margin-bottom:6px;">Message (optional)</label>
                <textarea wire:model.defer="message" rows="4" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:10px;"></textarea>
                @error('message') <small style="color:red;">{{ $message }}</small> @enderror
            </div>

            <button type="submit" style="background:#00aeef;color:#fff;border:none;width:100%;height:56px;border-radius:12px;font-weight:700;">
    Submit Free Booking
</button>
        </form>
    </div>
</div>
