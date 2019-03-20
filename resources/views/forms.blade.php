
<html>
    <head>
        <title>@yield('title')</title>
       	@include('headAssets')
        @yield('pageUniqueStyles')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
   
    <body>
    	<div class="formsWrapper">
    		<div id="backArrow"><a style="color: whitesmoke; text-decoration: none;" href="{{redirect('home')}}"><i class="fal fa-long-arrow-left"></i> Back</a></div>
    		@yield('content')
    	</div>
        @include('scriptAssets')
    </body>
</html>