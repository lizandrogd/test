<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    Hola {{Auth::User()->name }}, Bienvenido
                </div>
                <div class="w-full">
                    <img src="./img/inicio.svg" alt="" class=" mx-auto sm:w-5/6 lg:w-2/6 ">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
