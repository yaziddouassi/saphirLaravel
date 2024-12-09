<div>
    <div class="w-full mb-[5px]">
       <span class="text-[darkblue]">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
    </div>

    <div>
        <select type="text" wire:model="saphirFields.{{$field}}"
         class="w-full  bg-[#E8E8E8] h-[50px]
        border-[darkblue] border-[1px]">
            <option value=""></option>
            @foreach ($collection as $item)
                <option value="{{$item}}">{{$item}}</option>
            @endforeach
        </select> 
    </div>


    @error("saphirFields.$field")
    <div class="text-[red] pt-[5px]">
         <span class="error">{{ $message }}</span> 
    </div>
    @enderror

 </div>