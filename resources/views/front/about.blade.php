@extends('front.main')


<?php
$seo = json_object($settings->seo);
?>



{{--replace with site content--}}
@section('title')
{{ site_content($site_content,'about_us_page_title') }}
@endsection


@section('seo')

    <meta name="description"
          content="{{ site_content($site_content,'about_us_page_title') }}">
    <meta name="keywords"
          content="{{ site_content($site_content,'about_us_page_title') }}">

@endsection



@section('content')

  <!-- breadcrumb -->
  <div class="page-title">
        <div class="page-title-wrapper" data-stellar-background-ratio="0.5">
            @if(strlen(site_content($site_content,'about_cover_img'))>0)
            <img src="{{ getImage(SETTINGS_PATH.site_content($site_content,'about_cover_img')) }}" class="img_header_p">

            @else 
            <img src="{{ furl() }}/images/h1-slider1.jpg" class="img_header_p">

            @endif

            <div class="content container">
                <h1 class="heading_primary">{{ site_content($site_content,'about_us_page_title') }}</h1>
                <ul class="breadcrumbs">
                    <li class="item"><a href="{{ route('front.get.home.index') }}">{{ site_content($site_content,'home') }}</a></li>
                    <li class="item"><span class="separator"></span></li>
                    <li class="item active">{{ site_content($site_content,'about_us_page_title') }}</li>
                </ul>
            </div>
        </div>
    </div>

    
    <div class="site-content no-padding">

            <div class="page-content mb-5">
                <div class="container">

                    <div class="about-info">
                        <div class="col-sm-12">
                          {!! site_content($site_content,'about_content')  !!}
                        </div>
                    </div>
            </div>
            </div>

        </div>


@endsection

@section('ajax')
    @include('front.ajax.contactus')
@endsection


