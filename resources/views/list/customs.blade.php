<div>
    @foreach ($listingCustoms as $index => $item)
    <x-saphir-modal :modalShow="'false'" :index="$index">
        @include('saphir::list.customForm')
     </x-saphir-modal> 
    @endforeach
    
</div>