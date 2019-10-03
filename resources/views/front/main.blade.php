<!DOCTYPE html>
<html lang="en">



@include('front.inc._header')


<body class="demo-1 home">


<!-- Wrapper content -->
<div id="wrapper-container" class="content-pusher">
    <div class="overlay-close-menu"></div>


    @include('front.inc._mainNav') 


    <!-- Main Content -->
    <div id="main-content" class="main-content">

        @yield('content')

        
         




        @include('front.inc._reviews')


        @include('front.inc._footer')


    </div>
  
	
</div><!-- wrapper-container -->

<div id="back-to-top">
    <i class="ion-ios-arrow-up" aria-hidden="true"></i>
</div>




@include('front.inc._linksFooter')
@include('front.ajax.subscribe')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
 <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d591cd317970521"></script> -->
</body>
</html>
