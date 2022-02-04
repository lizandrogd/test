<div>
    <div>
        <div class=" bg-white opacity-95 font-semibold  w-full h-full top-0 bottom-0 fixed z-50 p-auto show " wire:loading wire:target="crearProducto">
            <img src="./img/loading.gif" alt="" class=" w-1/3 inset-1/3  fixed " >
         </div>

        <div class=" my-3 px-2" x-cloack x-data="{open:false}">
            
            <!--BOTON AÑADIR PRODUCTO-->
            <div class="w-full text-right">
                <button class="rounded-full p-3  bg-blue-400 m-2 animate-pulse" x-on:click="open=true" x-show="!open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>
            </div>

            <!--CUADRO NUEVO PRODUCTO-->
            <div class="text-center border rounded pb-2 px-1" x-transition x-show="open">   
                <div class=" flex text-sm text-green-500 text-center bg-green-100 p-1">
                        <div class="mr-auto px-2">Nuevo producto</div>
                        <div class="ml-auto px-2" x-on:click="open=false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                </div>
                <div class="w-full  text-center px-2">
                    <input type="text" placeholder="Nombre" id="nombre" class="mr-auto rounded bg-gray-100 text-base border-none p-2 my-2 " wire:model.lazy="nombre">
                    <select name="talla" id="" wire:model.lazy="talla" class="px-7 rounded  bg-gray-100  my-2 py-2 border-none">
                        <option value="" class="px-4">Talla:</option>
                        <option value="S" class="px-4">S</option>
                        <option value="m" class="px-4">M</option>
                        <option value="L" class="px-4">L</option>
                    </select>
                </div>
                <textarea name="observaciones" id="" cols="" rows="2" placeholder="Observaciones" class="w-full  px-2 rounded bg-gray-100 border-none py-2" wire:model.lazy="observaciones" ></textarea>
                <select name="marca" id="marca" wire:model.lazy="marca" class="px-7 rounded  bg-gray-100  my-2 py-2 border-none">
                    <option value="" selected>Marca: </option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                    @endforeach
                </select>
                <input type="number" placeholder="cantidad" id="cantidad" class="mr-auto rounded bg-gray-100 text-base border-none p-2 my-2 " wire:model.lazy="cantidad">
                <div for="fecha" class="text-sm bg-gray-100 w-full text-gray-400 mt-1">Fecha de embarque</div>
                <input type="date" placeholder="fecha" id="fecha" class="mr-auto rounded bg-gray-100 text-base border-none p-2 my-2 " wire:model.lazy="fecha">
                <br>
                <button class="rounded-full bg-blue-400 text-white px-5 py-2 my-1" wire:click="crearProducto">Guardar</button>
            </div>

        </div>

        <div class="text-center w-full  ">
            
                <input type="text " class="rounded border p-2 ml-auto w-3/6 my-2 bg-blue-100 uppercase " wire:model="searchRef" placeholder="Buscar por nombre..">
           
        
            </div>

        <!--ERROR CAMPOS OBLIGATORIOS-->
        @error('nombre') <div class="error bg-red-100 text-red-400 px-3 py-1 text-sm">El campo nombre es obligatorio.</div> @enderror
        @error('talla') <div class="error bg-red-100 text-red-400 px-3 py-1 text-sm">La talla es obligatoria.</div> @enderror
        @error('observaciones') <div class="error bg-red-100 text-red-400 px-3 py-1 text-sm">Las observaciones son obligatorias.</div> @enderror
        @error('marca') <div class="error bg-red-100 text-red-400 px-3 py-1 text-sm">La marca es obligatoria.</div> @enderror
        @error('cantidad') <div class="error bg-red-100 text-red-400 px-3 py-1 text-sm">La cantidad es obligatoria.</div> @enderror
        @error('fecha') <div class="error bg-red-100 text-red-400 px-3 py-1 text-sm">La fecha es obligatoria.</div> @enderror

        <!--MENSAJES DE NOTIFICACION-->
        @if (session()->has('actualizarProducto'))
            <div role="alert">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2 mt-2">
                Excelente
                </div>
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700 mb-2">
                <p>{{ session('actualizarProducto') }}</p>
                </div>
            </div>
        @endif
        @if (session()->has('eliminarProducto'))
            <div role="alert">
                <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2 mt-2">
                Excelente
                </div>
                <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700 mb-2">
                <p>{{ session('eliminarProducto') }}</p>
                </div>
            </div>
        @endif
        @if (session()->has('guardarProducto'))
            <div role="alert">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2 mt-2">
                Excelente
                </div>
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700 mb-2">
                <p>{{ session('guardarProducto') }}</p>
                </div>
            </div>
        @endif

         <!--TABLA DE PRODUCTOS-->
         <table class="w-full" >
            <tr class="bg-gray-100">
                <th>Nombre</th>
                <th>Talla</th>
                <th>Observaciones</th>
                <th>Marca</th>
                <th>Cant.</th>
                <th>Fecha</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($productos as $producto)
            <tr x-data="{open:false}">
                <td class="text-center">
                    <div x-show="!open">
                        {{$producto->nombre}}
                    </div>
                    <div class="" x-show="open">
                        <input type="text" wire:model.lazy="nombre" class="text-sm rounded  bg-gray-100 p-1 my-1">
                    </div>
                </td>
                <td class="text-center">
                    <div x-show="!open">
                        {{$producto->talla}}
                    </div>
                    <div class="" x-show="open">
                        <select name="talla" id="" wire:model.lazy="talla" class="  pr-6 pl-1 text-sm rounded  bg-gray-100 p-1 my-1">
                            <option value="" class="px-4">Talla:</option>
                            <option value="S" class="px-4">S</option>
                            <option value="m" class="px-4">M</option>
                            <option value="L" class="px-4">L</option>
                        </select>
                    </div>
                </td>
                <td class="text-center">
                    <div x-show="!open">
                        {{$producto->observaciones}}
                    </div>
                    <div class="" x-show="open">
                        <input type="text" wire:model.lazy="observaciones" class=" text-sm rounded w-full bg-gray-100 p-1 my-1">
                    </div>
                </td>
                <td class="text-center">
                    <div x-show="!open">
                        {{$producto->marcas->nombre}}
                    </div>
                    <div class="" x-show="open">
                        <select name="marca" id="marca" wire:model.lazy="marca" class="pr-7 pl-1 text-sm rounded  bg-gray-100 p-1 my-1">
                            <option value="" selected>Marca: </option>
                            @foreach ($marcas as $marca)
                                <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td class="text-center">
                    <div x-show="!open">
                        {{$producto->cantidad}}
                    </div>
                    <div class="" x-show="open">
                        <input type="text" wire:model.lazy="cantidad" class="text-sm w-16 rounded bg-gray-100 p-1 my-1">
                    </div>
                </td>
                <td class="text-center">
                    <div x-show="!open">
                        {{$producto->fecha}}
                    </div>
                    <div class="" x-show="open">
                        <input type="date" wire:model.lazy="fecha" class="text-sm rounded  bg-gray-100 p-1 my-1">
                    </div>
                </td>
                <td>
                    <button class="py-1 " x-on:click="open=true" x-show="!open" wire:click="editarProducto({{$producto_id = $producto->id}})" > <!--EDITAR-->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h76 w-7 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                     </button>
                     <div class="py-1 flex text-center" x-show="open">  <!--GUARDAR-->
                        <button class="mx-auto" wire:click="actualizarProducto({{$producto_id = $producto->id}})" >
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
                    <button class="py-1" wire:click="eliminarProducto({{$producto_id = $producto->id}}) "> <!--ELIMINAR-->
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
