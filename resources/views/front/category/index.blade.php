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
            <img src="{{ getImage(CATEGORY_PATH.$row->cover) }}"
            alt="{{ json_value($row,'cover_alt') }}" title="{{ json_value($row,'cover_title') }}" class="img_header_p">
            <div class="content container">
                <h1 class="heading_primary">{{ $row->name }}</h1>
                <ul class="breadcrumbs">
                    <li class="item"><a href="{{ route('front.get.home.index') }}">{{ site_content($site_content,'home') }}</a></li>
                    <li class="item"><span class="separator"></span></li>
                    <li class="item active">{{ $row->name }}</li>
                </ul>
            </div>
        </div>
    </div>



@include('front.inc._search')


        <!-- Top Destinations -->
<div class="group-destination">
                <div class="sc-content-overlay">
    
                    <div class="container">
                        <div class="empty-space"></div>
                        <div class="sc-posts style-01 auto-height">
                            <div class="item row">

                                @if(count($row->sub)>0)
                                @foreach ($row->sub as $item)
                                <div class="post col-sm-6 col-md-4">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="{{ route('front.get.subCategory.index',[$row->slug,$item->slug]) }}">
                                                    <img src="{{ getImage(SUBCATEGORY_PATH.$item->img) }}"
                                                    alt="{{ json_value($item,'img_alt') }}" title="{{ json_value($item,'img_title') }}"></a>
                                            </div>
                                            <div class="content">
                                                <h3 class="title"> <a href="{{ route('front.get.subCategory.index',[$row->slug,$item->slug]) }}">{{ $item->name }}</a></h3>
                                                <div class="summary">{{ $item->small_desc }}</div>
                                                <a href="{{ route('front.get.subCategory.index',[$row->slug,$item->slug]) }}"  class="read-more">
                                                        {{ site_content($site_content,'more_info') }}</a>
                                            </div>
                                        </div>
                                </div>
                                @endforeach


                                @else

                                <h1 style="text-align: center;margin : 10% auto">Empty List.</h1>

                                @endif
                          
                              
                                
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    

        <!-- Why Choose Us -->

        @include('front.inc._get_your_tour')


@endsection

@section('ajax')
@include('front.ajax.index')
    {{-- @include('front.ajax.subscribe')
    --}}
@endsection



