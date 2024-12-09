<div class="relative mt-[5px] rounded-[3px] bg-[#000022] text-white
                 text-center p-[10px] w-[200px]" x-show="$wire.actionsDiv1">
                   

            @foreach ($listingActions as $cle => $item)

            @if ($listingActionConfirms[$cle] == false)
            <div class="pt-[2px] flex justify-center"
                    @click="executeAction('{{$cle}}')"
                   >
                   <span class="material-icons"
                   style="color: {{$listingActionIconColors[$cle]}};display:block;"
                   >
                        {{$listingActionIcons[$cle]}}  
                        </span>
                      &nbsp;<span style="color: {{$listingActionLabelColors[$cle]}};
                      display:block;
                      ">
                       {{$listingActionLabels[$cle]}}</span> </div>
            @endif


            @if ($listingActionConfirms[$cle] != false)
            <div class="pt-[2px] flex justify-center"
            onclick="confirm('{{$listingActionConfirms[$cle]}}')
                    || event.stopImmediatePropagation()"
                    @click="executeAction('{{$cle}}')"
                   >
                   <span class="material-icons"
                   style="color: {{$listingActionIconColors[$cle]}};display:block;"
                   >
                        {{$listingActionIcons[$cle]}}  
                        </span>
                      &nbsp;<span style="color: {{$listingActionLabelColors[$cle]}};
                      display:block;
                      ">
                       {{$listingActionLabels[$cle]}}</span> </div>
            @endif



            @endforeach

                    
</div>