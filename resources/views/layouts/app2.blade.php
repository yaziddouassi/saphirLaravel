<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <style>
        .fa-times-thin:before {
	     content: '\00d7';
        }
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
</head>
<body>

    {{$slot}}
    
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   
    @livewireScripts
    
    <script>
        
        Alpine.data('admin', (comp) => {
            return {
             count: 0,
               
               init() {

                Object.keys(comp.saphirFiles).forEach(key => {
                    comp.saphirFile0pens[key] = false;
                 });
                
               },

               executeAction(a) {
                this.rezetabs();
                comp.actionsDiv1  = false ;
                comp.$call(a) ;
                
               },
   
             activateCustom(a) {
                console.log(a)
                comp.$call(a)
             },

               openCustom(a,b) {
                this.rezetabs();
                comp.activeId = a ;
                this.rezetOpenCustom();
                this.rezetsaphirFile0pen();
                comp.listingCustomOpens[b]= true;
                comp.$call(comp.listingCustomOnModals[b]);
                       
            },

            rezetOpenCustom() {
                Object.keys(comp.listingCustomOpens).forEach(key => {
                    comp.listingCustomOpens[key] = false;
                 });
            },

            rezetsaphirFile0pen() {
                Object.keys(comp.saphirFile0pens).forEach(key => {
                    comp.saphirFile0pens[key] = false;
                 });
            },
               
              
               rezetabs() {
              
                 const elements = document.querySelectorAll('.groupId');
                 elements.forEach((element) => {
   
                      const closestParent = element.closest('td');
                      element.checked = false ;
                      closestParent.style.borderLeft = '0px solid transparent';
                      
                       
                }); 
                comp.groupId = []
             },
   
               addtabs() {
                 const elements = document.querySelectorAll('.groupId');
   
                 var array1 = [];
   
                 elements.forEach((element) => {
   
                 const closestParent = element.closest('td');
   
                 if (element.checked) {
                   
                   closestParent.style.borderLeft = '2px solid blue';
                   array1.push(element.value)
                      } else {
                       closestParent.style.borderLeft = '0px solid transparent';
                    }
                }); 
                
                comp.groupId = array1
                console.log(comp.groupId)
                   
               },
            }
        })
    
     
    </script>
    
    
</body>
</html>