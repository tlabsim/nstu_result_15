<!DOCTYPE html>
<html lang="en"><head>
      @yield('title')
      
      @include('public.layouts.common.styles')
      @include('public.layouts.common.scripts')
  </head>
  <body>  
      <div class="main">        
          @include('public.layouts.common.header')
      		@yield('contents')	
          @include('public.layouts.common.footer')    
      </div>
  </body>  
</html>