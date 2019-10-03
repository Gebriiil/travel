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
                    <img src="{{ getImage(TOUR_PATH.$tour->cover) }}"
                    alt="{{ json_value($tour,'cover_alt') }}" title="{{ json_value($tour,'cover_title') }}" class="img_header_p">
                    <div class="content container">
                        <h1 class="heading_primary">{{ $tour->name }}</h1>
                        <ul class="breadcrumbs">
                            <li class="item"><a href="{{ route('front.get.home.index')  }}">{{ site_content($site_content,'home') }}</a></li>
                            <li class="item"><span class="separator"></span></li>
                            <li class="item"><a href="{{ route('front.get.category.index',$category->slug) }}">{{ $category->name }} </a></li>
                            <li class="item"><span class="separator"></span></li>
                            <li class="item active"><a href="{{ route('front.get.subCategory.index',[$category->slug,$sub_category->slug]) }}">{{ $sub_category->name }} </a></li>
                            <li class="item"><span class="separator"></span></li>
                            <li class="item active">{{ $tour->name }} </li>
                       
                        </ul>
                    </div>
                </div>
        </div>



        <div class="site-content container single">
                <div class="room-single row">
                    <main class="site-main col-sm-12 col-md-9 flex-first">
                        <div class="room-wrapper">
                            <div class="room_gallery clearfix">
                                <div class="camera_wrap camera_emboss" id="camera_wrap">

                                    @foreach ($gallary as $image)
                                    <div  data-src="{{ getImage(TOUR_PATH.$image->img) }}" ></div>
                                    @endforeach
                                    
                                
                                </div>
                            </div>
                            <div class="title-share clearfix">
                                <h2 class="title">{{ $tour->name }}</h2>
                            </div>
                            <div class="room_price">
                                <span class="price_value price_min">${{ $tour->price_start_from }}</span>
                                <span class="unit">{{ site_content($site_content,'night') }}</span>
                            </div>
                            <div class="description">
                                <p>{{ $tour->small_desc }}</p>
                            </div>
                            <div class="tabs_view">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="home" aria-selected="true">{{ site_content($site_content,'overview') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="profile" aria-selected="false">{{ site_content($site_content,'itinerary') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="contact" aria-selected="false">{{ site_content($site_content,'accommodation') }}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="con_tabs-view">
                                            <p>
                                                {!! $tour->desc !!}
                                            </p>
                                            <h3>{{ site_content($site_content,'included') }}</h3>
                                            <div>
                                                    {!! $tour->inclusion !!}
                                            </div>
                                           
                                        
                                         
                                            <h3>{{ site_content($site_content,'excluded') }}</h3>
                                            <div>
                                                    {!! $tour->exclusion !!}
                                            </div>
                                        </div>
                                    </div>



                                    <!--start itienraries-->

                                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="profile-tab">
                                        
                                        @foreach ($itineraries as $itinerary)
                                        
                                        <div class="con_tabs-view"> 
                                            <h4>{{ $itinerary->title }}</h4>     
                                            {!! $itinerary->desc !!}
                                        </div>                   
                                        @endforeach                                          
                                    </div>



                                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="con_tabs-view">
                                            <p>

                                                {!! $category->childrens_policy !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="room_pricing">
                                <h3 class="title style-01">{{ site_content($site_content,'pricing_plans') }}</h3>
                                

                                @foreach($daily_pricing_tables_ids as $id)
                                <h4 class="title style-01">{{ $daily_pricing_data[$id]['table']->title }}</h4>
                                @foreach($daily_pricing_data[$id]['hotels'] as $hotel)

                                <div class="col-lg-6 col-md-6 col-xs-12 nopadding">
                                    <div class="hotel-pricing-hotel">

                                        <div class="img_hotel_p">
                                            
                                            @if ($hotel->img_title && $hotel->img_alt)
                                            <img style="width: 100px;height: 100px;"
                                              alt="{{ $hotel->img_alt }}" title="{{ $hotel->img_title }}"
                                                 src="{{ getImage(HOTEL_PATH.'small/'.$hotel->img)}}">  
                                            @else
                                            <img style="width: 100px;height: 100px;"
                                            src="{{ getImage(HOTEL_PATH.'small/'.$hotel->img)}}">  
                                            @endif
                                            
                                            
                                        </div>

                                        <div class="des_hotel_p">
                                            <h3>{{$hotel->name}}</h3>
                                            <p>{{$hotel->city_name}}</p>
                                        </div>

                                        


                                    </div>

                                </div>


                            @endforeach
                                <?php 
                                            $content = json_decode($daily_pricing_data[$id]['table']->content);

                                    ?>
                                    
                                <table class="room-pricing">
                                    <thead>
                                    <tr>
                                        <th>{{ $content->first_title }}</th>
                                        <th>{{ $content->second_title }}</th>
                                        <th>{{ $content->third_title }}</th>
                                        <th>{{ $content->fourth_title }}</th>
                                        <th>{{ $content->fifth_title }}</th>
                                        <th>{{ $content->six_title }}</th>
                                        <th>{{ $content->seventh_title }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $content->first_price }} $</td>
                                        <td>{{ $content->second_price }} $</td>
                                        <td>{{ $content->third_price }} $</td>
                                        <td>{{ $content->fourth_price }} $</td>
                                        <td>{{ $content->fifth_price }} $</td>
                                        <td>{{ $content->six_price }} $</td>
                                        <td>{{ $content->seventh_price }} $</td>
                                       
                                        
                                    </tr>
                                    </tbody>
                                </table>


                                @endforeach

                                @foreach($package_pricing_tables_ids as $id)
                                <h4 class="title style-01">{{ $package_pricing_data[$id]['table']->title }}</h4>
                                @foreach($package_pricing_data[$id]['hotels'] as $hotel)

                                <div class="col-lg-6 col-md-6 col-xs-12 nopadding">
                                    <div class="hotel-pricing-hotel">

                                        <div class="img_hotel_p">
                                             
                                            @if ($hotel->img_title && $hotel->img_alt)
                                            <img style="width: 100px;height: 100px;"
                                              alt="{{ $hotel->img_alt }}" title="{{ $hotel->img_title }}"
                                                 src="{{ getImage(HOTEL_PATH.'small/'.$hotel->img)}}">  
                                            @else
                                            <img style="width: 100px;height: 100px;"
                                            src="{{ getImage(HOTEL_PATH.'small/'.$hotel->img)}}">  
                                            @endif
                                        </div>

                                        <div class="des_hotel_p">
                                            <h3>{{$hotel->name}}</h3>
                                            <p>{{$hotel->city_name}}</p>
                                        </div>

                                        


                                    </div>

                                </div>

                            @endforeach

                                <?php 
                                            $content = json_decode($package_pricing_data[$id]['table']->content);

                                    ?>
                                <table class="room-pricing">
                                    <thead>
                                    <tr>
                                        <th class="text-center" colspan="2">{{ $content->summer_title }}</th>
                                        <th  class="text-center" colspan="2">{{ $content->winter_title }}</th>
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $content->summer_single_title }}</td>
                                        <td>{{ $content->summer_single_price }} $</td>
                                        <td>{{ $content->winter_single_title }}</td>
                                        <td>{{ $content->winter_single_price }} $</td>
                                      
                                   </tr>
                                    <tr>
                                        <td>{{ $content->summer_double_title }}</td>
                                        <td>{{ $content->summer_double_price }} $</td>
                                        <td>{{ $content->winter_double_title }}</td>
                                        <td>{{ $content->winter_double_price }} $</td>
                                   </tr>
                                    <tr>
                                        <td>{{ $content->summer_triple_title }}</td>
                                        <td>{{ $content->summer_triple_price }} $</td>
                                        <td>{{ $content->winter_triple_title }}</td>
                                        <td>{{ $content->winter_triple_price }} $</td>
                                   </tr>
                                    </tbody>
                                </table>
                                @endforeach
                                
                            </div>
                        </div>
                    </main>
                    <aside id="secondary" class="widget-area col-sm-12 col-md-3 sticky-sidebar">
                        <div class="wd wd-book-room">
                            {{-- <a href="#booking-form" class="book-room">Booking Your Trip</a> --}}
    
                            {{--  <div id="form-popup-room" class="form-popup-room">
                                <div class="popup-container">
                                    <a href="#" class="close-popup"><i class="ion-android-close"></i></a>
                                    <form id="hotel-popup-results" name="hb-search-single-room" class="hotel-popup-results">
                                        <div class="room-head">
                                            <h3 class="room-title">Booking Your Trip</h3>
                                            <p class="description">Please enter the information to complete the book your trip.</p>
                                        </div>
                                        <div class="search-room-popup">
                                            <ul class="form-table clearfix">
                                                <li class="form-field">
                                                    <input type="text" name="name" id="name" required class="name" placeholder="Your Name*">
                                                </li>
                                                <li class="form-field">
                                                    <input type="email" name="email" id="email" required class="email" placeholder="Your Email*">
                                                </li>
                                                <li class="form-field">
                                                    <input type="tel" name="phone" id="phone" required class="phone" placeholder="Your Phone*">
                                                </li>
                                                <li class="form-field">
                                                    <input type="text" name="add" id="add" required class="add" placeholder="Nationality*">
                                                </li>
                                                <li class="form-field">
                                                    <input type="text" name="check_in_date" id="popup_check_in_date" required class="check_in_date" placeholder="Check">
                                                </li>
                                                <li class="form-field">
                                                    <input type="text" name="check_out_date" id="popup_check_out_date" required class="check_out_date " placeholder="Departure Date">
                                                </li>
    
                                                <li class="form-field room-submit">
                                                    <button id="check_date" class="submit" type="submit">Book Now</button>
                                                </li>
                                            </ul>
    
                                        </div>
                                    </form>
                                </div>
                            </div>  --}}
    
                            <div class="sidber-box popular-post-widget">
                                <div class="cats-title">{{ site_content($site_content,'details_tours') }}</div>
                                <div class="popular-post-inner">
                                    <ul>
                                        <li>{{ site_content($site_content,'category') }}<a href="{{ route('front.get.category.index',$category->slug) }}">{{ $category->name }}</a></li>
                                        <li>{{ site_content($site_content,'date') }}<a>{{ $tour->created_at }}</a></li>
                                        <li>{{ site_content($site_content,'price') }}<a>{{ $tour->price_start_from }} $</a></li>
                                        <li>{{ site_content($site_content,'hotel_class') }}
                                            <a>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
    
                        </div>
                        <div class="wd wd-check-room" id="booking-form">
                            <h3 class="title">{{ site_content($site_content,'book') }}</h3>
                            <form name="search-rooms" class="wd-search-room datepicker">
                                <ul class="form-table row">
                                        <input type="hidden" name="tour_id" id="tour_id" required value="{{ $tour->id }}">

                                        <li class="form-field col-md-12">
                                            <input type="text" name="check_in_date" id="check_in_date" required class="check_in_date" placeholder="{{ site_content($site_content,'arrivate_date') }}">
                                        </li>
        
                                        <li class="form-field col-md-12">
                                            <input type="text" name="check_out_date" id="check_out_date" required class="check_out_date " placeholder="{{ site_content($site_content,'departure_date') }}">
                                        </li>
        
                                        <li class="select-field form-field text_form  col-md-6">
    
                                                <input type="number" name="adults" id="adults" required  placeholder="{{ site_content($site_content,'adults') }}">
                                        </li>
        
                                        <li class="select-field form-field text_form  col-md-6">
                                                <input type="number" name="childrens" id="childrens" required  placeholder="{{ site_content($site_content,'childrens') }}">
    
                                        </li>
        
                                        <li class="form-field text_form col-md-12">
                                            <input type="text" name="name" id="namez" required  placeholder="{{ site_content($site_content,'book_name') }}">
                                        </li>
        
                                        <li class="form-field text_form col-md-12">
                                            <input type="text" name="email" id="emailz" required  placeholder="{{ site_content($site_content,'book_email') }}">
                                        </li>
        
                                        <li class="form-field text_form col-md-12">
                                            <input type="text" name="phone" id="phonez" required  placeholder="{{ site_content($site_content,'book_phone') }}">
                                        </li>
        
                                        <li class="select-field form-field text_form  col-md-12">
                                            <select name="nationality" id="nationality">
                                                <option value="">{{ site_content($site_content,'book_nationality') }}</option>
                                                @include('front.tour.countries_dropdown')
                                            </select>
                                        </li>

                                        <li class="form-field text_form col-md-12">
                                                <input type="text" name="message" id="message" required  placeholder="{{ site_content($site_content,'book_message') }}">
                                            </li>

                                    </ul>
    
                                
                                <div class="room-submit">
                                    <button class="submit" id="button_submit" type="submit">{{ site_content($site_content,'check_availability') }}</button>
                                </div>
                                <span id="error-msg"></span>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        



@endsection

@section('ajax')
@include('front.ajax.index')
@include('front.ajax.booking')
  
@endsection



