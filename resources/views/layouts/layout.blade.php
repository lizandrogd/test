
<x-guest-layout>
    <!--Barra de navegaciòn-->
  @include('layouts.navigation')
  
  <div>
      <header class="bg-white shadow sticky top-0 z-40">
      <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8 flex ">
        <a href="{{ url()->previous() }}" class="my-auto ">
        <div class="p-1 ">
          @yield('icon_back')
        </div>
        </a>
        <h1 class="text-2xl font-bold text-gray-900 px-3 my-auto ">
          @yield('header')
        </h1>
        <div class="ml-auto my-auto ">
          @yield('icon')
        </div>
      </div>
    </header>
    <main>
      <div class="max-w-7xl mx-auto pb-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-0  pb-6  sm:px-0">
          @yield('cuerpo')
          
        </div>
        <!-- /End replace -->
      </div>
    </main>
  </div>
  
  </x-guest-layout>