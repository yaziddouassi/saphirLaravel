<div x-data="{
    init() {
    var trixEditor = document.getElementById('trixeditor-{{$field}}')
    
        addEventListener('trix-change', function(event) {
            $wire.saphirFields.{{$field}} = trixEditor.getAttribute('value')
        })
    }
    }">

    <div class="w-full mb-[5px]">
        <span class="text-[darkblue]">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
     </div>

        <input id="trixeditor-{{$field}}" type="hidden"  
        wire:model="saphirFields.{{$field}}"
        value="{{ $saphirFields[$field]}}">
        <div>
           <trix-editor wire:ignore input="trixeditor-{{$field}}"
           class="bg-white mt-[10px] min-h-[200px]"
           ></trix-editor>
        </div>
        @error("saphirFields.$field")
           <div class="text-[red] pt-[5px]">
        <span class="error">{{ $message }}</span> 
       </div>
        @enderror
        
    </div>