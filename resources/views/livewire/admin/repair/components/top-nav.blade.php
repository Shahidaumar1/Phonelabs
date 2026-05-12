 <nav class=" px-3 " style=" background-color: transparent;">
     <div class="d-flex justify-content-between align-items-center ">
         <i class="fa fa-bars cursor-pointer text-black" aria-hidden="true" onclick="toggleLeftDrawer()"></i>

     
         <div class="d-none d-md-flex align-items-center admin-top-items">
             <div>
                 <a href="{{ route('repair-categories') }}"
                     class=" text-dark  p-3 {{ $active == 'categories' ? 'text-danger fw-bold  p-3' : '' }}">Devices</a>
             </div>
             <div>
                 <a href="{{ route('repair-devices') }}"
                     class=" text-dark p-3   {{ $active == 'devices' ? 'text-danger fw-bold  p-3' : '' }}">Brands</a>
             </div>

             <div>
                 <a href="{{ route('repair-models') }}"
                     class=" text-dark p-3   {{ $active == 'models' ? 'text-danger fw-bold  p-3' : '' }}">Models</a>
             </div>

             <div>
                <a href="{{ route('repair-price') }}"
                    class=" text-dark p-3   {{ $active == 'price' ? 'text-danger fw-bold  p-3' : '' }}">Repair</a>
            </div>



         </div>

         <livewire:components.avatar />
     </div>

 </nav>
