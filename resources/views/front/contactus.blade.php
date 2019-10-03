@extends('front.main')


<?php
$seo = json_object($settings->seo);
?>



{{--replace with site content--}}
@section('title')
{{ site_content($site_content,'contact_us_page_title') }}
@endsection


@section('seo')

    <meta name="description"
          content="{{ site_content($site_content,'contact_us_page_title') }}">
    <meta name="keywords"
          content="{{ site_content($site_content,'contact_us_page_title') }}">

@endsection



@section('content')

  <!-- breadcrumb -->
  <div class="page-title">
        <div class="page-title-wrapper" data-stellar-background-ratio="0.5">
            @if(strlen(site_content($site_content,'contact_cover_img'))>0)
            <img src="{{ getImage(SETTINGS_PATH.site_content($site_content,'contact_cover_img')) }}" class="img_header_p">

            @else 
            <img src="{{ furl() }}/images/h1-slider1.jpg" class="img_header_p">

            @endif

            <div class="content container">
                <h1 class="heading_primary">{{ site_content($site_content,'contact_us_page_title') }}</h1>
                <ul class="breadcrumbs">
                    <li class="item"><a href="{{ route('front.get.home.index') }}">{{ site_content($site_content,'home') }}</a></li>
                    <li class="item"><span class="separator"></span></li>
                    <li class="item active">{{ site_content($site_content,'contact_us_page_title') }}</li>
                </ul>
            </div>
        </div>
    </div>

    
    <div class="site-content no-padding">

            <div class="page-content mb-5">
                <div class="container">

                    <div class="about-info">
                        <div class="col-sm-12">
                           {!! json_value($settings,'iframe') !!}
                        </div>
                    </div>

                    <div class="row">

                    <div class="col-sm-6">
                        <div class="sc-heading">
                            <br>
                            <br>
                            <h3 class="second-title">{{ site_content($site_content,'send_message_title') }}</h3>
                            <p class="description">{{ site_content($site_content,'form_desc') }}</p>
                        </div>

                        <div class="sc-contact-form">
                            <form  id="ajaxform" method="post">
                                <input type="text" id="name" name="your-name" required placeholder="{{ site_content($site_content,'your_name') }}">
                                <input type="text" id="country" name="your-name" required placeholder="{{ site_content($site_content,'your_country') }}">
                                <input type="email" id="email" name="your-email" required placeholder="{{ site_content($site_content,'your_email') }}">
                                <input type="tel"  id="phone" name="your-phone" required placeholder="{{ site_content($site_content,'your_phone') }}">
                                <input type="text" id="msg_title" name="your-name" required placeholder="{{ site_content($site_content,'msg_title') }}">

                    
                                <textarea name="your-message" id="msg_body" cols="30" rows="10" required placeholder="{{ site_content($site_content,'your_msg') }}"></textarea>
                                <input id="button_submit" type="submit" class="submit" value="{{ site_content($site_content,'send_message_btn') }}">
                                <span id="error-msg"></span>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="empty-space"></div>
                        <div class="empty-space"></div>
                        <div class="sc-contact-info">
                            <div class="sc-heading">
                                <p class="first-title">{{ site_content($site_content,'contact_details') }}</p>
                                <p class="description"><a href="#">{!! json_value($settings,'address') !!}</a></p>
                            </div>
                            <p class="phone">{{ site_content($site_content,'call') }} <a href="tel:{!! json_value($settings,'phone') !!}">{!! json_value($settings,'phone') !!}</a></p>
                            <p class="phone">{{ site_content($site_content,'fax') }} {!! json_value($settings,'fax') !!}</p>
                            <p class="email"><a href="mailto:{!! json_value($settings,'email') !!}">{!! json_value($settings,'email') !!}</a></p>
                            <ul class="sc-social-link style-03">
                                <li><a target="_blank" class="face" href="{!! json_value($settings,'facebook') !!}" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" class="twitter" href="{!! json_value($settings,'twitter') !!}" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a target="_blank" class="instagram" href="{!! json_value($settings,'instagram') !!}" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    </div>

                </div>
            </div>

        </div>


@endsection

@section('ajax')
    @include('front.ajax.contactus')
@endsection


