@include('../frontend/partials.head')
   


    <div id="app">
      
            @include('../frontend/partials/home/header')
            @yield('content')
       
    </div>

@include('../frontend/partials/home/footer')    