<div class="container   align-items-center" >
    @error('error')
    <div class=" alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Payment failed!</strong> {{ $message }}
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror
  <div class="container d-flex justify-content-center">
    <button wire:click="createPayment" class="btn btn-{{ $color ?? '' }}" style="width: 180px;">
        <span class="p-2">
            Pay with PayPal
            @if ($loading)
                <span>
                    <x-spinner color="black" />
                </span>
            @endif
        </span>
    </button>
</div>

    <div class="form-check m-2">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>

        <label  class="form-check-label" for="flexCheckChecked"><a href="{{ route('privacy-and-policy') }}">I Agree to Privacy Policy</a> And <a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></label>
    </div>
</div>

<style>
    .blu{
        min-height:300px;background: #ffffff 0% 0% no-repeat padding-box; max-width: 550px "
    }
    }
</style>