@extends('front.main')



<?php
$seo = json_object($settings->seo);
?>

@section('title')
@if(isset($seo->metaTitle)){{$seo->metaTitle}}@else{{$settings->site_name}}@endif
@endsection


@section('seo')

    <meta name="description" content="@if(isset($seo->metaDescription)){{$seo->metaDescription}}@else{{$settings->site_name}}@endif">
    <meta name="keywords" content="@if(isset($seo->metKeywords)){{$seo->metKeywords}}@else{{$settings->site_name}}@endif">

@endsection


@section('content')


        <!-- breadcrumb -->
        <div class="page-title">
                <div class="page-title-wrapper" data-stellar-background-ratio="0.5">
                        @if(strlen(site_content($site_content,'search_cover_image'))>0)
                        <img src="{{ getImage(SETTINGS_PATH.site_content($site_content,'search_cover_image')) }}" class="img_header_p">
            
                        @else 
                        <img src="{{ furl() }}/images/h1-slider1.jpg" class="img_header_p">
            
                        @endif



                        <div class="content container">
                        <h1 class="heading_primary">{{ site_content($site_content,'search_results') }}</h1>
                        <ul class="breadcrumbs">
                            <li class="item"><a href="{{ route('front.get.home.index')  }}">{{ site_content($site_content,'home') }}</a></li>
                            <li class="item"><span class="separator"></span></li>

                            <li class="item active">{{ site_content($site_content,'search_results') }}</li>
                        </ul>
                    </div>
                </div>
            </div>



@include('front.inc._search')

@if(count($tours)>0)
<!-- tours -->
<div class="site-content container">
    <div class="shop-filter">
        <div class="switch-wrap clearfix">
            <div class="switch-layout">
                <a href="javascript:;" class="list switchToGrid switcher-active"><i class="fa fa-th-large"></i></a>
                <a href="javascript:;" class="grid switchToList"><i class="fa fa-th-list"></i></a>
            </div>
            <p class="shop-count"> {{ site_content($site_content,'showing') }} 0 - {{ count($tours) }} {{ site_content($site_content,'results') }}</p>
          
        </div>
    </div>

    <div class="shop-content layout-grid row archive_switch">

        @foreach ($tours as $tour)
        <div class="product col-md-4 col-sm-6">
                <div class="product-content">
                    <div class="product-media">
                        <img class="tour-img" src="{{ getImage(TOUR_PATH.$tour->img) }}"
                        alt="{{ json_value($tour,'img_alt') }}" title="{{ json_value($tour,'img_title') }}">
                    </div>
                    <div class="product-summary">
                        <h2 class="product-title">
                            <a href="{{ route('front.get.tour.index',[$tour->subCategory->category->slug,$tour->subCategory->slug,$tour->slug]) }}">{{ $tour->name }}</a>
                        </h2>
                        <div class="show-list">
                            <div class="rating"><span class="rating-star"></span></div>
                            {{--  <div class="price"> {{ $tour->price_start_from }}</div>  --}}
                            <p class="description">

                                {{ $tour->small_desc }}
                            </p>
                        </div>
                        <div class="content clearfix">
                            <span class="product-meta">{{ site_content($site_content,'category_from') }} {{ $tour->price_start_from }} $ {{ site_content($site_content,'person') }}</span>
                            <a href="{{ route('front.get.tour.index',[$tour->subCategory->category->slug,$tour->subCategory->slug,$tour->slug]) }}" class="btn-icon b_list">{{ site_content($site_content,'view_more') }}</a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
       
        <div class="loop-pagination">
                {{ $tours->links('front.pagination') }}
        </div>

    
    </div>

</div>

@else 

<h1 style="text-align: center;margin : 10% auto">No Search Results Were Found.</h1>
@endif

    



@endsection

@section('ajax')
@include('front.ajax.index')
@endsection



