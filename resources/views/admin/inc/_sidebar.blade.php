<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">

    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

            </li>

            <li class="nav-item start {{ sidebar_base('')  }} ">
                <a href="{{ route('admin.get.home.index') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">@lang('site.dashboard')</span>
                    <span class="arrow"></span>
                </a>
            </li>

            <li class="heading">
                <h3 class="uppercase"> @lang('site.content') </h3>
            </li>


            <li class="nav-item {{ sidebar_base('settings')  }}  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">@lang('site.settings')</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidebar_base('settings','base')  }}">
                        <a href="{{ route('admin.get.settings.base') }}" class="nav-link ">
                            <span class="title">@lang('site.base')</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidebar_base('settings','seo')  }} ">
                        <a href="{{ route('admin.get.settings.seo') }}" class="nav-link ">
                            <span class="title">@lang('site.seo')</span>
                        </a>
                    </li>




                    <li class="nav-item {{ sidebar_base('settings','site')  }} ">
                        <a href="{{ route('admin.get.settings.siteContent') }}" class="nav-link ">
                            <span class="title">@lang('site.siteContent')</span>
                        </a>
                    </li>

                    {{-- <li class="nav-item {{ sidebar_base('settings','aboutus')  }} ">
                    <a href="{{ route('admin.get.settings.aboutus') }}" class="nav-link ">
                        <span class="title">@lang('site.aboutUsPage')</span>
                    </a>
            </li> --}}


        </ul>
        </li>
        <!-- 
        <li class="nav-item {{ sidebar_base('language')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-language"></i>
                <span class="title">@lang('site.language')</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ sidebar_base('language','add')  }}">
                    <a href="{{ route('admin.get.language.add') }}" class="nav-link ">
                        <span class="title">@lang('site.add')</span>
                    </a>
                </li>
                <li class="nav-item {{ sidebar_base('language','all')  }} ">
                    <a href="{{ route('admin.get.language.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li> -->





        <li class="nav-item {{ sidebar_base('admin')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-user-circle"></i>
                <span class="title">@lang('site.admins')</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ sidebar_base('admin','add')  }}">
                    <a href="{{ route('admin.get.admin.add') }}" class="nav-link ">
                        <span class="title">@lang('site.add')</span>
                    </a>
                </li>
                <li class="nav-item {{ sidebar_base('admin','all')  }} ">
                    <a href="{{ route('admin.get.admin.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item {{ sidebar_base('country')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-flag"></i>
                <span class="title">Countries</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ sidebar_base('country','add')  }}">
                    <a href="{{ route('admin.get.country.add') }}" class="nav-link ">
                        <span class="title">@lang('site.add')</span>
                    </a>
                </li>
                <li class="nav-item {{ sidebar_base('country','all')  }} ">
                    <a href="{{ route('admin.get.country.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item {{ sidebar_base('city')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-map-o"></i>
                <span class="title">Cities</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ sidebar_base('city','add')  }}">
                    <a href="{{ route('admin.get.city.add') }}" class="nav-link ">
                        <span class="title">@lang('site.add')</span>
                    </a>
                </li>
                <li class="nav-item {{ sidebar_base('city','all')  }} ">
                    <a href="{{ route('admin.get.city.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item {{ sidebar_base('category')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-list-alt"></i>
                <span class="title">Categories</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ sidebar_base('category','add')  }}">
                    <a href="{{ route('admin.get.category.add') }}" class="nav-link ">
                        <span class="title">@lang('site.add')</span>
                    </a>
                </li>
                <li class="nav-item {{ sidebar_base('category','all')  }} ">
                    <a href="{{ route('admin.get.category.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item {{ sidebar_base('subCategory')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-list"></i>
                <span class="title">Sub Categories</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ sidebar_base('subCategory','add')  }}">
                    <a href="{{ route('admin.get.subCategory.add') }}" class="nav-link ">
                        <span class="title">@lang('site.add')</span>
                    </a>
                </li>
                <li class="nav-item {{ sidebar_base('subCategory','all')  }} ">
                    <a href="{{ route('admin.get.subCategory.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item {{ sidebar_base('hotel')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-bed"></i>
                <span class="title">Hotels</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ sidebar_base('hotel','add')  }}">
                    <a href="{{ route('admin.get.hotel.add') }}" class="nav-link ">
                        <span class="title">@lang('site.add')</span>
                    </a>
                </li>
                <li class="nav-item {{ sidebar_base('hotel','all')  }} ">
                    <a href="{{ route('admin.get.hotel.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item {{ sidebar_base('slider')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-sliders"></i>
                <span class="title">Sliders</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ sidebar_base('slider','add')  }}">
                    <a href="{{ route('admin.get.slider.add') }}" class="nav-link ">
                        <span class="title">@lang('site.add')</span>
                    </a>
                </li>
                <li class="nav-item {{ sidebar_base('slider','all')  }} ">
                    <a href="{{ route('admin.get.slider.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item {{ sidebar_base('review')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-comment"></i>
                <span class="title">Reviews</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ sidebar_base('review','add')  }}">
                    <a href="{{ route('admin.get.review.add') }}" class="nav-link ">
                        <span class="title">@lang('site.add')</span>
                    </a>
                </li>
                <li class="nav-item {{ sidebar_base('review','all')  }} ">
                    <a href="{{ route('admin.get.review.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item {{ sidebar_base('tour')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-umbrella"></i>
                <span class="title">Tours</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ sidebar_base('tour','add')  }}">
                    <a href="{{ route('admin.get.tour.add') }}" class="nav-link ">
                        <span class="title">@lang('site.add')</span>
                    </a>
                </li>
                <li class="nav-item {{ sidebar_base('tour','all')  }} ">
                    <a href="{{ route('admin.get.tour.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item {{ sidebar_base('contact')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-phone"></i>
                <span class="title">Contacts</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">


                <li class="nav-item {{ sidebar_base('contact','all')  }} ">
                    <a href="{{ route('admin.get.contact.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item {{ sidebar_base('subscriber')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-envelope"></i>
                <span class="title">Subscribers</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">


                <li class="nav-item {{ sidebar_base('subscriber','all')  }} ">
                    <a href="{{ route('admin.get.subscriber.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item {{ sidebar_base('reservation')  }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-check-circle"></i>
                <span class="title">Reservations</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">


                <li class="nav-item {{ sidebar_base('reservation','all')  }} ">
                    <a href="{{ route('admin.get.reservation.index') }}" class="nav-link ">
                        <span class="title">@lang('site.view')</span>
                    </a>
                </li>

            </ul>
        </li>
        {{--
            <li class="nav-item {{ sidebar_base('transfer')  }} ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-car"></i>
            <span class="title">Transfers</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">


            <li class="nav-item {{ sidebar_base('transfer','all')  }} ">
                <a href="{{ route('admin.get.transfer.index') }}" class="nav-link ">
                    <span class="title">@lang('site.view')</span>
                </a>
            </li>

        </ul>
        </li> --}}

        {{-- <li class="nav-item {{ sidebar_base('p2p')  }} ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-bar-chart"></i>
            <span class="title">P2P</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">


            <li class="nav-item {{ sidebar_base('p2p','all')  }} ">
                <a href="{{ route('admin.get.transfer.index') }}" class="nav-link ">
                    <span class="title">@lang('site.view')</span>
                </a>
            </li>

        </ul>
        </li> --}}

        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->


<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->

        <!-- END THEME PANEL -->