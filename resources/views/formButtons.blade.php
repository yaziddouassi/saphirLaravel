<div class="p-[10px] pt-[0px]">
    <button class="bg-[blue] w-[100px] text-white p-[9px] rounded-[2px]"
   wire:click="saphirCreate()"  >Créer</button>
    &nbsp;
    <button @click="$dispatch('foo')" wire:click="saphirCreateOther()"
      class="border-[1px] border-black w-[140px] text-black p-[9px] rounded-[2px]">
        Créer un autre
   </button>
</div>
