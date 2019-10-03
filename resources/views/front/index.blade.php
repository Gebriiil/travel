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


<!-- slider -->
<div id="home-main-content" class="home-main-content home-1">
    <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="home-1" data-source="gallery">
        <!-- START REVOLUTION SLIDER 5.4.7.4 fullwidth mode -->
        <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7.4">
            <ul>
                <!-- SLIDE  -->
                @foreach ($sliders as $key=>$slider)

                @if($key==0)
                <li data-index="rs-10" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ getImage(SLIDER_PATH.$slider->img)  }}" alt="{{ json_value($slider,'img_alt') }}" title="{{ json_value($slider,'img_title') }}" width="1422" height="800" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <h1 class="tp-caption   tp-resizeme" id="slide-10-layer-1" data-x="['center','center','center','center']" data-hoffset="['8','8','8','7']" data-y="['middle','middle','middle','middle']" data-voffset="['-109','-109','-109','-62']" data-fontsize="['66','66','40','30']" data-lineheight="['78','78','50','36']" data-fontweight="['700','700','700','700']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":100,"frame":"999","to":"y:-50px;opacity:0;","ease":"nothing"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 66px; line-height: 78px; font-weight: 700; color: rgba(255,255,255,1);">
                        {{ $slider->title }}
                    </h1>

                    <!-- LAYER NR. 2 -->
                    <p class="tp-caption   tp-resizeme" id="slide-10-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','1','1']" data-y="['middle','middle','middle','middle']" data-voffset="['5','5','-24','12']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 18px; line-height: 22px; font-weight: 400; color: rgba(255,255,255,1);">
                        {{ $slider->desc }} </p>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption   tp-resizeme  thim-link-slider2" id="slide-10-layer-3" data-x="['center','center','center','center']" data-hoffset="['10','10','0','2']" data-y="['middle','middle','middle','middle']" data-voffset="['105','105','89','114']" data-lineheight="['1','1','','']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-actions='[{"event":"click","action":"simplelink","target":"_blank","url":"rooms.html","delay":""}]' data-responsive_offset="on" data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":100,"frame":"999","to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[17,17,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[16,16,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 15px; line-height: 1px; font-weight: 400; color: rgba(255,255,255,1);text-transform:uppercase;">

                        @if($slider->link!=null)
                        <a target="_blank" href="{{ $slider->link }}">{{ site_content($site_content,'discover') }}</a>
                        @endif

                    </div>
                </li>
                @else

                <!-- SLIDE  -->
                <li data-index="rs-11" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ getImage(SLIDER_PATH.$slider->img)  }}" alt="{{ json_value($slider,'img_alt') }}" title="{{ json_value($slider,'img_title') }}" width="1461" height="800" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 4 -->
                    <h1 class="tp-caption   tp-resizeme" id="slide-10-layer-1" data-x="['center','center','center','center']" data-hoffset="['8','8','8','7']" data-y="['middle','middle','middle','middle']" data-voffset="['-109','-109','-109','-62']" data-fontsize="['66','66','40','30']" data-lineheight="['78','78','50','36']" data-fontweight="['700','700','700','700']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":100,"frame":"999","to":"y:-50px;opacity:0;","ease":"nothing"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 66px; line-height: 78px; font-weight: 700; color: rgba(255,255,255,1);">
                        {{ $slider->title }}
                    </h1>

                    <!-- LAYER NR. 2 -->
                    <p class="tp-caption   tp-resizeme" id="slide-10-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','1','1']" data-y="['middle','middle','middle','middle']" data-voffset="['5','5','-24','12']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 18px; line-height: 22px; font-weight: 400; color: rgba(255,255,255,1);">
                        {{ $slider->desc }}</p>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption   tp-resizeme  thim-link-slider2" id="slide-10-layer-3" data-x="['center','center','center','center']" data-hoffset="['10','10','0','2']" data-y="['middle','middle','middle','middle']" data-voffset="['105','105','89','114']" data-lineheight="['1','1','','']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-actions='[{"event":"click","action":"simplelink","target":"_blank","url":"rooms.html","delay":""}]' data-responsive_offset="on" data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":100,"frame":"999","to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[17,17,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[16,16,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 15px; line-height: 1px; font-weight: 400; color: rgba(255,255,255,1);text-transform:uppercase;">
                        @if($slider->link!=null)
                        <a target="_blank" href="{{ $slider->link }}">{{ site_content($site_content,'discover') }}</a>
                        @endif
                    </div>
                </li>

                @endif

                @endforeach

            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div><!-- END REVOLUTION SLIDER -->


</div>


<!-- Search -->
@include('front.inc._search')


<!-- Top Destinations -->
<div class="group-destination">
    <div class="sc-content-overlay">

        <div class="container">
            <div class="empty-space"></div>
            <div class="sc-heading style-01 text-center">
                <h3 class="title">{{ site_content($site_content,'top_destinations') }}</h3>
                <p class="description">{{ site_content($site_content,'top_destinations_desc') }}</p>
            </div>
            <div class="sc-posts style-01 auto-height">
                <div class="item row">

                    <?php
                    $featured_count = 0;
                    ?>
                    @foreach($categories as $category)

                    @if($category->featured=='yes' && $featured_count<=6) <?php $featured_count++; ?> <div class="post col-sm-6 col-md-4">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="{{ route('front.get.category.index',$category->slug) }}"><img src="{{ getImage(CATEGORY_PATH.$category->img) }}" alt="{{ json_value($category,'img_alt') }}" title="{{ json_value($category,'img_title') }}"></a>
                            </div>
                            <div class="content">
                                <h3 class="title"> <a href="{{ route('front.get.category.index',$category->slug) }}">{{ $category->name }}</a></h3>
                                <div class="short-text"> {{ $category->small_desc }}</div>
                                <div class="summary">
                                    {!! substr($category->desc , 0, 150) !!}
                                </div>


                                <a href="{{ route('front.get.category.index',$category->slug) }}" class="read-more">{{ site_content($site_content,'more_info') }}</a>
                            </div>
                        </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

</div>
</div>

<!-- Why Choose Us -->
@include('front.inc._get_your_tour')

<!-- offers -->
<div class="empty-space"></div>
<div class="container">
    <div class="sc-heading style-04 text-center">
        <h3 class="title">{{ site_content($site_content,'special_offers') }}</h3>
        <p class="description">{{ site_content($site_content,'special_offers_desc') }}</p>
    </div>

    @if (count($special_offers)>0)

    <div class="sc-rooms style-04">
        <div class="row">


            <div class="items-small col-sm-3">

                @if (count($special_offers)>0 && isset($special_offers[0]))
                <div class="item">
                    <a href="{{ route('front.get.tour.index',[$special_offers[0]->subCategory->category->slug,$special_offers[0]->subCategory->slug,$special_offers[0]->slug]) }}">
                        <img class="offer-img" src="{{ getImage(TOUR_PATH.$special_offers[0]->img) }}" alt="{{ json_value($special_offers[0],'img_alt') }}" title="{{ json_value($special_offers[0],'img_title') }}"></a>
                    <div class="content">
                        <h4 class="title"><a href="{{ route('front.get.tour.index',[$special_offers[0]->subCategory->category->slug,$special_offers[0]->subCategory->slug,$special_offers[0]->slug]) }}">{{ $special_offers[0]->name }}</a></h4>
                        <div class="price">{{ $special_offers[0]->price_start_from }} $</div>
                        <div class="rating"><span class="rating-star"></span></div>
                    </div>
                </div>
                @endif

                @if (count($special_offers)>=1 && isset($special_offers[1])) <div class="item">
                    <a href="{{ route('front.get.tour.index',[$special_offers[1]->subCategory->category->slug,$special_offers[1]->subCategory->slug,$special_offers[1]->slug]) }}">
                        <img class="offer-img" src="{{ getImage(TOUR_PATH.$special_offers[1]->img) }}" alt="{{ json_value($special_offers[1],'img_alt') }}" title="{{ json_value($special_offers[1],'img_title') }}">
                    </a>

                    <div class="content">
                        <h4 class="title"><a href="{{ route('front.get.tour.index',[$special_offers[1]->subCategory->category->slug,$special_offers[1]->subCategory->slug,$special_offers[1]->slug]) }}">{{ $special_offers[1]->name }}</a></h4>
                        <div class="price">{{ $special_offers[1]->price_start_from }} $</div>
                        <div class="rating"><span class="rating-star"></span></div>
                    </div>
                </div>

                @endif

            </div>
            <div class="item-large col-sm-6">
                @if (count($special_offers)>=2 && isset($special_offers[2]))
                <div class="item">
                    <img class="offer-center-img" src="{{ getImage(TOUR_PATH.$special_offers[2]->img) }}" alt="{{ json_value($special_offers[2],'img_alt') }}" title="{{ json_value($special_offers[2],'img_title') }}">
                    <div class="content">
                        <h4 class="title"><a href="{{ route('front.get.tour.index',[$special_offers[2]->subCategory->category->slug,$special_offers[2]->subCategory->slug,$special_offers[2]->slug]) }}">{{ $special_offers[2]->name }}</a></h4>
                        <div class="price">{{ $special_offers[2]->price_start_from }} $</div>
                        <div class="rating"><span class="rating-star"></span></div>
                    </div>

                </div>
                @endif
            </div>
            <div class="items-small col-sm-3">
                @if (count($special_offers)>=3 && isset($special_offers[3]))
                <div class="item">
                    <img class="offer-img" src="{{ getImage(TOUR_PATH.$special_offers[3]->img) }}" alt="{{ json_value($special_offers[3],'img_alt') }}" title="{{ json_value($special_offers[3],'img_title') }}">
                    <div class="content">
                        <h4 class="title"><a href="{{ route('front.get.tour.index',[$special_offers[3]->subCategory->category->slug,$special_offers[3]->subCategory->slug,$special_offers[3]->slug]) }}">{{ $special_offers[3]->name }}</a></h4>
                        <div class="price">{{ $special_offers[3]->price_start_from }} $</div>
                        <div class="rating"><span class="rating-star"></span></div>
                    </div>
                </div>
                @endif
                @if (count($special_offers)>=4 && isset($special_offers[4]))
                <div class="item">
                    <img class="offer-img" src="{{ getImage(TOUR_PATH.$special_offers[4]->img) }}" alt="{{ json_value($special_offers[4],'img_alt') }}" title="{{ json_value($special_offers[4],'img_title') }}">
                    <div class="content">
                        <h4 class="title"><a href="{{ route('front.get.tour.index',[$special_offers[4]->subCategory->category->slug,$special_offers[4]->subCategory->slug,$special_offers[4]->slug]) }}">{{ $special_offers[4]->name }}</a></h4>
                        <div class="price">{{ $special_offers[4]->price_start_from }} $</div>
                        <div class="rating"><span class="rating-star"></span></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    @endif


</div>


<!-- Latest Tour -->
<div class="sc-rooms style-02">
    <div class="container">
        <div class="sc-heading style-04 mt-5 text-center">
            <h3 class="title">{{ site_content($site_content,'latest_tours') }}</h3>
            <p class="description">{{ site_content($site_content,'latest_tours_desc') }}</p>
        </div>
        <div class="rooms-content layout-grid style-02">
            <div class="row">

                @foreach ($latest_tours as $latest_item)
                <div class="room col-sm-4 mb-4 clearfix">
                    <div class="room-item">
                        <div class="room-media">
                            <a href="{{ route('front.get.tour.index',[$latest_item->subCategory->category->slug,$latest_item->subCategory->slug,$latest_item->slug]) }}">
                                <img class="latest-tour-img" src="{{ getImage(TOUR_PATH.$latest_item->img) }}" alt="{{ json_value($latest_item,'img_alt') }}" title="{{ json_value($latest_item,'img_title') }}"></a>
                        </div>
                        <div class="room-summary">
                            <h3 class="room-title">
                                <a href="{{ route('front.get.tour.index',[$latest_item->subCategory->category->slug,$latest_item->subCategory->slug,$latest_item->slug]) }}">
                                    <p>{{ $latest_item->name }}</p>
                                </a>
                            </h3>
                            <ul class="room-info">
                                <li>
                                    <p>{{ substr($latest_item->small_desc , 0, 100) }}</p>
                                </li>
                            </ul>
                            <div class="line"></div>
                            <div class="room-meta clearfix">
                                <div class="price">
                                    <span class="title-price">{{ site_content($site_content,'from') }}:</span>
                                    <span class="price_value price_min">{{ $latest_item->price_start_from }}$</span>

                                </div>
                                
                                @if($latest_item->num_of_days)
                                <div class="price">
                                    <span class="title-price">Days :</span>
                                    <span class="price_value price_min">{{ $latest_item->num_of_days }} Days</span>
                                </div>
                                @endif

                                <div class="rating"><span class="star"></span></div>
                                
                            </div>



                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>
</div>



@endsection

@section('ajax')
@include('front.ajax.index')

@endsection