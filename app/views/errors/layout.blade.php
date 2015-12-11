<!DOCTYPE html>
<html lang="en"><head>
      @yield('title')

      @include('public.layouts.common.meta')
      <link rel="stylesheet" href="styles/site/error_styles.css" type="text/css" media="screen">
  </head>
  <body>    	
      <div class="main"> 
      		@yield('contents')	
      </div>
  </body>  
</html>