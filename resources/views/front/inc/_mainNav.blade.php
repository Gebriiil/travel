<!-- navber -->
<!-- Header -->
<header id="masthead" class="header-default affix-top sticky-header ">
    <div class="row">
        <div class="header-menu col-sm-12 tm-table">
            <div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
                <div class="icon-wrap">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
            </div>

            <!-- development branch-->
            <div class="width-logo sm-logo table-cell text-center">
                <a href="{{ route('front.get.home.index') }}" class="no-sticky-logo" title="Hotel HTML Template">
                    <img class="logo" src="{{ getImage(SETTINGS_PATH.json_value($settings,'logo')) }}" alt="{{ json_value($settings,'img_alt') }}" title="{{ json_value($settings,'img_title') }}">
                    <img class="mobile-logo" src="{{ getImage(SETTINGS_PATH.json_value($settings,'logo')) }}" alt="{{ json_value($settings,'img_alt') }}" title="{{ json_value($settings,'img_title') }}">
                </a>
                <a href="index.html" class="sticky-logo">
                    <img src="{{ getImage(SETTINGS_PATH.json_value($settings,'logo')) }}" alt="{{ json_value($settings,'img_alt') }}" title="{{ json_value($settings,'img_title') }}">
                </a>

            </div>
            <div class="width-navigation navigation table-cell">

                <div class="top-toolbar clearfix">
                    <div class="toolbar-info pull-left col-sm-4">
                        <i class="ion-ios-telephone"></i> <span class="label">{{ site_content($site_content,'need_help') }}</span>
                        <a class="value" href="tel:{{ json_value($settings,'phone') }}"> {{ json_value($settings,'phone') }}</a>
                    </div>
                    <div class="toolbar-right pull-right col-sm-8">
                        {{-- <div class="weather">
                            Today: <img src="{{furl()}}/images/icons/weather.png" alt="">
                        <span class="temperature">28°C</span>
                    </div> --}}


                    <div class="container">

                        <form method="GET" class="pull-right col-sm-5 p-0" action="{{route('front.get.tours.search')}}">
                            <div class="input-group mt-2">
                    
                                <input type="text" name="name" class="form-control fild-search_new" placeholder=""
                                 aria-label="Example text with button addon" aria-describedby="button-addon1" required>
                                <div class="input-group-prepend">
                                <input type="submit" value="Search" class="btn btn-outline-secondary btn_fild_searc">

                            </div>
                            </div>

                        </form>
                        <div id="google_translate_element" class="pull-right col-sm-2"></div>
                    </div>



                    
                    <!--                         
                        <div class="language">
                            <div class="dropdown">
                                <a  class="dropdown-toggle select" data-hover="dropdown" data-toggle="dropdown" aria-expanded="false">
                                
                                    <img style="height: 20px;width:20px;" src="{{ getImage(LANGUAGE_PATH.$lang->icon) }}">
                                    <p style="display: inline"> {{ $lang->name }}</p>
                                   
                                    
                                    <span class="fa fa-caret-down"></span>
                                </a>
                                <ul class="dropdown-language">
                
                                    @foreach (languages() as $item)
                                    <li>
                                        <a href="{{ route('front.get.home.switch.language',$item->symbol) }}">
                                        <img style="height: 20px;width:20px;display: inline"
                                        alt="{{ $item->name }}" title="{{ $item->name }}"
                                        src="{{ getImage(LANGUAGE_PATH.$item->icon) }}">
                                        <p style="display: inline">{{ $item->name }}</p>
                                        </a>
                                    </li>
                                    @endforeach
                                  
                                </ul>
                            </div>
                        </div> -->
                </div>
            </div>

            <ul class="nav main-menu">
                <li class="menu-item">
                    <a href="{{ route('front.get.home.index') }}">{{ site_content($site_content,'home') }}</a>
                </li>

                @foreach ($categories->take(4) as $item)
                @if($item->sub->count()>0)

                <li class="menu-item has-children">
                    <a href="{{ route('front.get.category.index',$item->slug) }}">{{ $item->name }}</a>
                    <ul class="sub-menu">
                        @foreach ($item->sub as $sub)
                        <li class="menu-item"><a href="{{ route('front.get.subCategory.index',[$item->slug,$sub->slug]) }}">{{ $sub->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @else
                <li class="menu-item"><a href="{{ route('front.get.category.index',$item->slug) }}">{{ $item->name }}</a></li>

                @endif
                @endforeach


                <li class="menu-item">
                    <a href="{{ route('front.get.about.index') }}">About Us</a>
                </li>
            </ul>
            <div class="header-right">
                <a href="{{ route('front.get.contact.index') }}" class="btn-book">{{ site_content($site_content,'contact') }}</a>
            </div>
        </div>
    </div>
    </div>
</header>

<!-- Mobile menu -->
<nav class="visible-xs mobile-menu-container mobile-effect">
    <div class="inner-off-canvas">
        <div class="menu-mobile-effect navbar-toggle">Close <i class="fa fa-times"></i></div>

        <ul class="nav main-menu">
            <li class="menu-item">
                <a href="{{ route('front.get.home.index') }}">{{ site_content($site_content,'home') }}</a>
            </li>

            @foreach ($categories->take(4) as $item)
            @if($item->sub->count()>0)

            <li class="menu-item has-children">
                <a href="{{ route('front.get.category.index',$item->slug) }}">{{ $item->name }}</a>
                <ul class="sub-menu">
                    @foreach ($item->sub as $sub)
                    <li class="menu-item"><a href="{{ route('front.get.subCategory.index',[$item->slug,$sub->slug]) }}">{{ $sub->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            @else
            <li class="menu-item"><a href="{{ route('front.get.category.index',$item->slug) }}">{{ $item->name }}</a></li>
            @endif
            @endforeach

            <li class="menu-item">
                <a href="{{ route('front.get.contact.index') }}" class="btn-book">{{ site_content($site_content,'contact') }}</a>
            </li>

        </ul>
    </div>
</nav>
<!-- nav.mobile-menu-container -->
<!-- /.nav end -->
