
<div class = "card p-3" >
    
        <label class = "pb-2"><b>Client ID</b></label>
        <input type="text" class="form-control input_form mb-2 w-75" placeholder="Client ID" aria-label="" wire:model.debounde.500="client_id" />
        @error('client_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
    
        <label class = "pb-2"><b>Secret</b></label>
        <input type="text" class="form-control input_form mb-2 w-75" placeholder="Secret" aria-label="" wire:model.debounde.500="secret" />
        @error('secret')
        <span class="text-danger">{{$message}}</span>
        @enderror


  
</div>
<div class="d-flex justify-content-end align-items-center pt-2">
    
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