 <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
     style="background-color: rgba(0,0,0,.5);">
     <!-- A basic modal dialog with title, body and one button to close -->
     <div class="relative h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0">
         <button wire:click="closeModal('{{ $propName }}')"
             class="absolute right-2 top-1 inline-flex justify-center text-red-600 font-semibold text-2xl">
             X
         </button>
         <div class="mt-3 text-center sm:mt-0 sm:text-left">
             <h3 class="text-lg font-medium leading-6 text-gray-900">
                 @if (isset($title))
                     {{ $title }}
                 @endif
             </h3>
             <div class="mt-2">
                 {{ $content }}
             </div>
         </div>
         <!-- One big close button.  --->
         <div class="mt-5 sm:mt-6">
             <span class="flex w-full rounded-md shadow-sm">
                 @if (isset($button))
                     {{ $button }}
                 @endif
             </span>
         </div>
     </div>
 </div>
