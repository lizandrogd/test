<div>
    <div>
        <div class=" my-3" x-cloack x-data="{open:false}">
            
            <!--BOTON AÑADIR MARCA-->
            <div class="w-full text-right">
                <button class="rounded-full p-3  bg-blue-400 m-2 animate-pulse" x-on:click="open=true" x-show="!open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>
            </div>

            <!--CUADRO NUEVA MARCA-->
            <div class="text-center border rounded pb-2 " x-transition x-show="open">   
                <div class=" flex text-sm text-green-500 text-center bg-green-100 p-1">
                        <div class="mr-auto px-2">Nueva marca</div>
                        <div class="ml-auto px-2" x-on:click="open=false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                </div>
                <div class="w-full flex text-center px-2">
                    <input type="text" placeholder="Nombre" id="marca" class="mr-auto rounded bg-gray-100 text-base border-none p-2 my-2  w-5/12 lg:w-5/12" wire:model.lazy="marca">
                    
                    <input type="text" placeholder="Referencia numerica" id="referencia" class="mr-auto rounded bg-gray-100 text-base border-none mx- p-2 my-2 w-5/12  lg:w-5/12 uppercase" wire:model.lazy="referencia">
                   
                    <button class="ml-auto w-1/12  lg:w-1/12" alt="Generar automatico" wire:click="generarReferencia">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                </div>
                <button class="rounded-full bg-blue-400 text-white px-5 py-2 my-1" wire:click="crearMarca">Guardar</button>
            </div>

        </div>

        <div class="text-center w-full  ">
            
            <input type="text " class="rounded border p-2 ml-auto w-3/6 my-2 bg-blue-100 uppercase " wire:model="searchRef" placeholder="Buscar por nombre..">
       
    
        </div>

        <!--ERROR CAMPOS OBLIGATORIOS-->
        @error('marca') <div class="error bg-red-100 text-red-400 px-3 py-1 text-sm">El campo nombre es obligatorio.</div> @enderror
        @error('referencia') <div class="error bg-red-100 text-red-400 px-3 py-1 text-sm">La referencia es obligatoria.</div> @enderror

        <!--MENSAJES DE NOTIFICACION-->
        @if (session()->has('actualizarMarca'))
            <div role="alert">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2 mt-2">
                Excelente
                </div>
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700 mb-2">
                <p>{{ session('actualizarMarca') }}</p>
                </div>
            </div>
        @endif
        @if (session()->has('eliminarMarca'))
            <div role="alert">
                <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2 mt-2">
                Excelente
                </div>
                <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700 mb-2">
                <p>{{ session('eliminarMarca') }}</p>
                </div>
            </div>
        @endif
        @if (session()->has('guardarMarca'))
            <div role="alert">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2 mt-2">
                Excelente
                </div>
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700 mb-2">
                <p>{{ session('guardarMarca') }}</p>
                </div>
            </div>
        @endif

        <!--TABLA DE MARCAS-->
        <table class="w-full" >
            <tr class="bg-gray-100">
                <th>Marca</th>
                <th>Referencia</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($marcas as $marca)
            <tr x-data="{open:false}">
                <td class="text-center">
                    <div x-show="!open">
                        {{$marca->nombre}}
                    </div>
                    <div class="" x-show="open">
                        <input type="text" wire:model.lazy="marca" class="text-sm rounded w-24 bg-gray-100 p-1 my-1">
                    </div>
                </td>
                <td class="text-center">
                    <div x-show="!open">
                        {{$marca->referencia}}
                    </div>
                    <div class="" x-show="open">
                        <input type="text" wire:model.lazy="referencia" class="text-sm rounded w-24 bg-gray-100 p-1 my-1">
                    </div>
                </td>
                <td>
                    <button class="py-1 " x-on:click="open=true" x-show="!open"> <!--EDITAR-->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h76 w-7 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                     </button>
                     <div class="py-1 flex text-center" x-show="open">  <!--GUARDAR-->
                        <button class="mx-auto" wire:click="actualizarMarca({{$marca_id = $marca->id}})" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                              </svg>
                        </button>
                        <button class="mx-auto" x-on:click="open=false"> <!--CANCELAR-->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                              </svg>
                        </button>
                    </div>
                     
                </td>
                <td class="text-center">
                    <button class="py-1" wire:click="eliminarMarca({{$marca_id = $marca->id}}) "> <!--ELIMINAR-->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </td>
            </tr>
            @endforeach
            
        </table>

        <!--IMG DE CARGA-->
        <div class="w-full text-center">
            <div class=" m-auto" wire:loading >
                <img src="./img/loading.gif" alt="" class="w-32 mx-auto">
            </div>
        </div>
        
    </div>
</div>



