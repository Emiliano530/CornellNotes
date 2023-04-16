<!--Si necesito un boton que siempre este en el mismo lugar pon el slot icon y text-->
@if(isset($icon) && isset($text) && $icon !== '' && $text !== '')
<div class="fixed bottom-0 right-0 mb-4 mr-8">
    <button onclick="openModal()" class=" group flex items-center focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:translate-x-5 dark:hover:bg-green-700 dark:bg-green-900 dark:focus:bg-green-900 dark:active:bg-green-900 text-white font-bold py-3 px-3 rounded-full overflow-hidden">
      <div class="w-6 h-6 text-white group-hover:inline-block">
        {{ $icon }}
      </div>
      <span class="hidden group-hover:inline-block ml-2 text-sm transition-all duration-500">{{ $text }}</span>
    </button>
    </div>
@endif

<!--si necesito un boton para eliminar pon el slot delete-->
    @if(isset($delete) && $delete !== '')
    <form id="delete-form" method="POST" action="{{ $url }}" accept-charset="UTF-8" style="display:inline">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" title="Delete Note" onclick="event.preventDefault(); openModal()">
        {{ $delete }}
    </button>
</form>
    @endif

    <!--si necesitas un boton normal pon el slot button y class si quieres personalizar la class-->
    @if(isset($button) && $button !== '')
        <button onclick="openModal()" class="{{ isset($class) ? $class : 'bg-cyan-700 rounded-3xl' }}">
            {{ $button }}
        </button>
    @endif

    <!--Aqui empieza el modal-->
	<div class="main-modal hidden fixed w-full h-100 inset-0 z-50 overflow-hidden text-white  justify-center items-center animated fadeIn faster"
		style="background: rgba(0,0,0,.7);">
		<div
			class="border border-cyan-500 shadow-lg modal-container bg-cyan-950 w-11/12 md:max-w-md mx-auto rounded-3xl z-50 overflow-y-auto">
			<div class="modal-content relative py-4 text-left px-6">
				<!--Title-->
				<div class="flex justify-center items-center pb-3 border-solid border-b-2">

                <!--para ponerle cabecera al modal pon el slot header-->
                @if(isset($header) && $header !== '')
					<p class="text-2xl font-bold">{{ $header }}</p>
                @endif
                    <div class="modal-close absolute top-2 right-4 cursor-pointer z-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-white hover:stroke-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
				</div>
				<!--Body-->
				<div class="my-5 text-center">
                    
                <!--si quieres ponerle cuerpo al modal pon el slot body-->
                @if(isset($body) && $body !== '')
					<p>{{ $body }}</p>
                    @endif
					
				</div>
				<!--Footer-->
				<div class="flex justify-end pt-2">

                <!--si quieres un boton de cancelar pon el slot cancel-->
                @if(isset($cancel) && $cancel !== '')
                 <button
                 class="modal-close focus:outline-none px-4 bg-gray-500 p-3 ml-3 rounded-3xl text-white hover:bg-gray-600 focus:bg-gray-700 active:bg-gray-800 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-700">{{ $cancel }}</button>
                @endif
                <!--si quieres un boton de confirmar pon el slot confirm-->
				@if(isset($confirm) && $confirm !== '')
                        <!--si quieres personalizar el class de fondo del boton confirmar pon el slot classConfirm-->
                        <button class="focus:outline-none px-4 p-3 ml-3 rounded-3xl text-white  focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 {{ isset($classConfirm) ? $classConfirm : 'bg-green-700 focus:bg-green-700 hover:bg-green-600 active:bg-green-900' }}">{{ $confirm }}</button>
                @endif
				</div>
			</div>
		</div>
	</div>

	<script>
		const modal = document.querySelector('.main-modal');
		const closeButton = document.querySelectorAll('.modal-close');
        
		const modalClose = () => {
			modal.classList.remove('fadeIn');
			modal.classList.add('fadeOut');
			setTimeout(() => {
				modal.style.display = 'none';
			}, 500);
		}

		const openModal = () => {
			modal.classList.remove('fadeOut');
			modal.classList.add('fadeIn');
			modal.style.display = 'flex';
		}

		for (let i = 0; i < closeButton.length; i++) {

			const elements = closeButton[i];

			elements.onclick = (e) => modalClose();

			modal.style.display = 'none';

			window.onclick = function (event) {
				if (event.target == modal) modalClose();
			}
		}

        const deleteForm = document.getElementById('delete-form');
    const confirmButton = document.getElementById('confirm-delete');

    // Add a click event listener to the confirmation button
    confirmButton.addEventListener('click', function() {
        // Submit the delete form
        deleteForm.submit();
    });

    const cancelButton = document.getElementById('cancel-delete');
    cancelButton.addEventListener('click', function() {
        closeModal();
    });
	</script>