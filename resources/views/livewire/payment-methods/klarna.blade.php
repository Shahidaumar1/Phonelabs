<div class="container justify-content-end align-items-center"
    style="">

    @error('error')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Payment failed!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
   
    <div>
        <!--<img src="https://cdn.worldvectorlogo.com/logos/klarna.svg" width="200px" height="150px"/>-->
    </div>

    <form class='w-100 '>

        <div style="position:relative;top:2px;" class="d-flex gap-2 flex-column">


            <button style="margin-left:10px; background-color:pink" type="button" wire:click="sendEmailBeforePay"
                class="btn " @if ($loading || $price == 0) disabled @endif>
                <div class="d-flex gap-3 justify-content-center align-itemes-center ">
                    Pay With Klarna
                    @if ($loading)
                        <span>
                            <x-spinner color="white" />
                        </span>
                    @endif
                </div>
            </button>
        </div>

    </form>
    <div class="form-check d-flex align-items-center ">
    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckChecked" checked>
    <label class="form-check-label mb-0" for="flexCheckChecked">
        <a href="{{ route('privacy-and-policy') }}" class="text-decoration-none">I Agree to Privacy Policy</a> And <a href="{{ route('terms-and-conditions') }}" class="text-decoration-none">Terms & Conditions</a>
    </label>
</div>

</div>
