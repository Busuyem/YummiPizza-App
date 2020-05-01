
       @include("inc.header")

       @include("inc.nav")


        <main class="container py-4">

            @yield('content')
            
        </main>


        <div>

            @yield('js')
            
            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

            
        </div>

        @include("inc.footer")
   
