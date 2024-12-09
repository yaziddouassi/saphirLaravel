{{-- @include('saphir.sidebar.sidewidjet',['route' => 'admin.categories', 'nameroute' => 'categories']) --}}
<div class="">
    @if (Request::path() == substr($route, 1))
    <a href="{{$route}}" wire:navigate>
    <div class="mt-[10px] flex mb-[10px] p-[5px] bg-[#8A2BE2] pl-[3px]
     pt-[10px] pb-[10px]  text-[18px] rounded-r-[18px]">
        <div class="pt-[2px]">
            <span class="material-icons text-[18px]">
                {{$icon}}
            </span>
            </div>
        <div class="pl-[5px]">
            <span>{{$nameroute}}</span>
        </div>
    </div>
   </a>
    @endif
    @if (Request::path() != substr($route, 1))
    <a href="{{$route}}" wire:navigate>
    <div class=" pl-[3px]  text-[18px] flex">
        <div class="pt-[2px]">
            <span class="material-icons text-[18px]">
                {{$icon}}  
            </span>
            </div>
        <div class="pl-[5px]">
            <span>{{$nameroute}}</span>
        </div>
    </div>
   </a>
    @endif

</div>