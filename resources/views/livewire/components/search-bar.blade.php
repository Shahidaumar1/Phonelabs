<div>
    <style>
        .search-bar.align-self-center.d-none .list-group.mylistgroup.mt-2 {
            position: absolute;
            z-index: 1000;
        } 
        .mylistitem {
            margin-bottom: -20px !important;
        } 
        .mylistitem:hover {
            margin-bottom: 0px !important; 
            padding-bottom: 0px !important; 
            color: #333; 
        }  
        ul.mylistgroup {
            scrollbar-width: thick;
            scrollbar-color: #F75D59 #fff;
        }
        ul.mylistgroup::-webkit-scrollbar {
            width: 20px;
        }
        ul.mylistgroup::-webkit-scrollbar-track {
            background: white; 
            border-radius: 20px;
        }
        ul.mylistgroup::-webkit-scrollbar-thumb {
            background-color: #F75D59; 
            border-radius: 20px;
            height: 100px;
        }
        .even-item:hover {
            background-color: #939391 !important;
        }
        .odd-item:hover {
            background-color: #ffc0cb !important;
        }
    </style>

    <div class="search-bar align-self-center d-none d-lg-block">
        <div class="d-flex">
<!--          <h6 style="font-size: 20px; color: #000; font-weight: 600; background-color: #f0f0f0; padding: 10px; border-radius: 5px;">-->
<!--  Search, type your phone model here...-->
<!--</h6>-->

            <div>

                <input type="text" class="form-control" placeholder="Search, type your phone model here.." wire:model="search"
                    style="border:1px solid black; border-radius:20px 0px 0px 20px; height:35px; font-size:12px; width:250px;">

                @if ($results)
                    <ul class="list-group mylistgroup mt-2" style="max-height: 300px; overflow-y: auto;">
                        @foreach ($results as $result)
                            @if ($result instanceof \App\Models\DeviceType)
                                @foreach ($result->modals as $modal)
                                    <li class="list-group-item mylistitem text-center">
                                        <a class="fw-bold" style="color: black;" href="javascript:void(0);"
                                            wire:click="navigate('modal', {{ $modal->id }})">
                                            {{ $modal->name }}
                                        </a>
                                        <ul class="list-group mylistgroup ml-3" style="margin-bottom: 50px !important;">
                                            @foreach ($modal->prices as $price)
                                                @if ($price->repairType)
                                                    <li class="list-group-item mylistitem {{ $loop->even ? 'even-item' : 'odd-item' }}"
                                                        style="{{ $loop->even ? 'background-color: #f0f0f0;' : '' }}">
                                                        <a class="d-flex justify-content-between align-items-center" style="color: black;"
                                                            href="javascript:void(0);" wire:click="navigate('price', {{ $price->id }})">
                                                            <p>{{ $price->repairType->name }}</p>
                                                            <p><b>£{{ $price->price }}</b></p>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                            @if ($modal->prices->isEmpty())
                                                <li class="list-group-item mylistitem">
                                                    <span>No prices available</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach
                            @elseif ($result instanceof \App\Models\Modal)
                                <li class="list-group-item mylistitem text-center">
                                    <a class="fw-bold" style="color: black;" href="javascript:void(0);"
                                        wire:click="navigate('modal', {{ $result->id }})">
                                        {{ $result->name }}
                                    </a>
                                    <ul class="list-group mylistgroup ml-3" style="margin-bottom:50px !important;">
                                        @foreach ($result->prices as $price)
                                            @if ($price->repairType)
                                                <li class="list-group-item mylistitem {{ $loop->even ? 'even-item' : 'odd-item' }}"
                                                    style="{{ $loop->even ? 'background-color: #f0f0f0;' : '' }}">
                                                    <a class="d-flex justify-content-between align-items-center" style="color: black;"
                                                        href="javascript:void(0);" wire:click="navigate('price', {{ $price->id }})">
                                                        <p>{{ $price->repairType->name }}</p>
                                                        <p><b>£{{ $price->price }}</b></p>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                        @if ($result->prices->isEmpty())
                                            <li class="list-group-item mylistitem">
                                                <span>No prices available</span>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @elseif ($result instanceof \App\Models\Price)
                                @if ($result->modal && $result->modal->deviceType)
                                    <li class="list-group-item mylistitem">
                                        <a style="color: black" href="javascript:void(0);"
                                            wire:click="navigate('price', {{ $result->id }})">
                                            Price: £{{ $result->price }} -
                                            Model: {{ $result->modal->name }} -
                                            Device Type: {{ $result->modal->deviceType->name }}
                                        </a>
                                        <ul class="list-group mylistgroup ml-3">
                                            <li class="list-group-item mylistitem">
                                                Repair Type: {{ $result->repairType ? $result->repairType->name : 'N/A' }}
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            @elseif ($result instanceof \App\Models\RepairType)
                                @php
                                    $prices = $result->prices->filter(function($price) {
                                        return $price->modal && $price->modal->deviceType;
                                    });
                                @endphp
                                @if ($prices->isNotEmpty())
                                    @foreach ($prices as $price)
                                        <li class="list-group-item mylistitem">
                                            <a style="color: black" href="javascript:void(0);"
                                                wire:click="navigate('price', {{ $price->id }})">
                                                Repair Type: {{ $result->name }} -
                                                Price: £{{ $price->price }} -
                                                Model: {{ $price->modal->name }} -
                                                Device Type: {{ $price->modal->deviceType->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="list-group-item mylistitem">
                                        <span>No prices available</span>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
            <p class="mb-0"
                style="background-color: black; border-radius:0px 20px 20px 0px; width:60px; height:35px; display: flex; justify-content: center; align-items: center;">
                <i class="fa fa-search text-white fs-10" aria-hidden="true" style="padding-right:10px;"></i>
            </p> 
        </div> 
    </div>
</div>