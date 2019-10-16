<!DOCTYPE html>

<html lang="en"  dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Name Of Site Here</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for blank page layout" name="description" />
        <meta content="" name="author" />

        <!-- seo code  -->
        @yield('seo')
        <!-- end -->
       
       <!-- links for styles  -->
        @include('admin.inc._head._linksHeader')
        <!-- end -->

        <!-- append new style  -->
        @yield('style')
        <!-- end -->

        <link href="{{aurl()}}/seoera/plugins/confirmation/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>




    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{ route('admin.get.home.index') }}">
                            @if(setting())
                                 @if(setting()->logo)
                                    <img src="{{getImage(SETTINGS_PATH.setting()->logo)}}" alt="logo" class="logo-default img-thumbnail" style="width:150px; height: 40px; margin-top: 2px; " />
                                 @else 
                                <img src="{{aurl()}}/layouts/layout/img/logo.png" alt="logo" class="logo-default" />

                                 @endif
                            @else 
                                <img src="{{aurl()}}/layouts/layout/img/logo.png" alt="logo" class="logo-default" />

                            @endif
                        </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->


                    <!-- top head -->
                    @include('admin.inc._head._topHead')
                    <!-- end top head -->





                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->

            <!-- BEGIN CONTAINER -->
            <div class="page-container">

               