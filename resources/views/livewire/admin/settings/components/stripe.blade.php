     <p >Stripe keys will work for Klarna also.</p>
<div class = "card p-3" >
   

        <label class = "pb-2 mt-3"><b>Private Key</b> </label>
        <input type="text" class="form-control input_form w-75 mp-3" placeholder="Secret Key" aria-label="" wire:model.debounde.500="secret" />
        @error('secret')
        <span class="text-danger pb-3">{{$message}}</span>
        @enderror

        <label class = "pb-2 mt-3"> <b>Public Key</b></label>
        <input type="text" class="form-control input_form w-75 mp-3" placeholder="Public Key" aria-label="" wire:model.debounde.500="public_key" />
        @error('public_key')
        <p class="">{{$message}}</p>
        @enderror
</div>

<div class="d-flex justify-content-end align-items-center pt-2 mb-3">
        <button type="button" class="{{$dirty ? 'selected-button' : 'unselected-button'}} " wire:click="connect" {{$dirty ? '' : 'disabled'}}>Connect</button>
        <span wire:loading wire:target="connect">connecting....</span>
        @if(session()->has('message'))
        <span class=" text-success">{{session('message')}}</h3>
          @endif

</div>
<style>
.card{
       min-width: 200px;
    border-radius: 20px;
    border: 1px solid gray;
    background: whitesmoke;
}

     
</style>