@extends('admin.main')



@section('content')
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">


        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('admin.get.home.index') }}" class="active-bread">@lang('site.home')</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>@lang('site.settings')</span>
            </li>
        </ul>

    </div>
    <!-- END PAGE BAR -->


    <!-- END PAGE MESSAGE -->
    @include('admin.msg._messages')


    <!-- END PAGE HEADER-->
    <div class="note note-info">
        <h3> @lang('site.baseSetting') ( @lang('site.settings') ) </h3>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">


                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.post.settings.updateBase') }}"
                          enctype="multipart/form-data" class="">

                        <div class="form-body row">
                            @csrf
                            @include('admin.msg._errors')


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.site_name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="site_name" class="form-control input-circle-right"
                                               value="{{ $base->site_name }}"></div>
                                    <input type="hidden" name="setting_type" value="base">
                                    <input type="hidden" name="id" value="{{ $base->id }}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <hr>
                                <h3>@lang('site.social')</h3>
                                <hr>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.facebook') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-facebook"></i>
                                        </span>
                                        <input type="text" name="facebook" class="form-control input-circle-right"
                                               value="{{ $base->facebook }}"></div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.twitter') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-twitter"></i>
                                        </span>
                                        <input type="text" name="twitter" class="form-control input-circle-right"
                                               value="{{ $base->twitter }}"></div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> @lang('site.instagram') </label>
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fa fa-instagram"></i>
                                            </span>
                                            <input type="text" name="instagram" class="form-control input-circle-right"
                                                   value="{{ $base->instagram }}"></div>
                                    </div>
                                </div>

                                
                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> @lang('site.pinterest') </label>
                                            <div class="input-group">
                                                <span class="input-group-addon input-circle-left">
                                                    <i class="fa fa-pinterest"></i>
                                                </span>
                                                <input type="text" name="pinterest" class="form-control input-circle-right"
                                                       value="{{ $base->pinterest }}"></div>
                                        </div>
                                    </div>

                                    

                            {{--  <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.gmail') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-google"></i>
                                        </span>
                                        <input type="text" name="gmail" class="form-control input-circle-right"
                                               value="{{ $base->gmail }}"></div>
                                </div>
                            </div>  --}}


                            {{--  <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.youtube') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-youtube"></i>
                                        </span>
                                        <input type="text" name="youtube" class="form-control input-circle-right"
                                               value="{{ $base->youtube }}"></div>
                                </div>
                            </div>  --}}


                            {{--  <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.trip_advisor') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-tripadvisor"></i>
                                        </span>
                                        <input type="text" name="trip_advisor" class="form-control input-circle-right"
                                               value="{{ $base->trip_advisor }}"></div>
                                </div>
                            </div>  --}}


                            <div class="col-md-12">
                                <hr>
                                <h3>@lang('site.contacts')</h3>
                                <hr>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.email') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" name="email" class="form-control input-circle-right"
                                               value="{{ $base->email }}"></div>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.site_email') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="email" name="site_email" class="form-control input-circle-right"
                                               value="{{ $base->site_email }}"></div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.fax') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-fax"></i>
                                        </span>
                                        <input type="number" name="fax" class="form-control input-circle-right"
                                               value="{{ $base->fax }}"></div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.phone') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <input type="number" name="phone" class="form-control input-circle-right"
                                               value="{{ $base->phone }}"></div>
                                </div>
                            </div>


                            {{--  <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.mobile') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-mobile"></i>
                                        </span>
                                        <input type="number" name="mobile" class="form-control input-circle-right"
                                               value="{{ $base->mobile }}"></div>
                                </div>
                            </div>
  --}}

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.address') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-mobile"></i>
                                        </span>
                                        <input type="text" name="address" class="form-control input-circle-right"
                                               value="{{ $base->address }}"></div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.logo')  </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                        <input type="file" name="logo" accept="image/*" onchange="loadFile(event)"
                                               class="form-control input-circle-right"></div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <img id="output" class="privew-image"
                                         @if($base->logo) src="  {{ getImage(SETTINGS_PATH.$base->logo) }}" @endif />
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> Image Title </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="img_title" class="form-control input-circle-right "
                                                required value="{{ $base->img_title }}"></div>
                                </div>
                            </div>


                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> Image Alt </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="img_alt" class="form-control input-circle-right "
                                                required value="{{ $base->img_alt }}"></div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> @lang('site.video')  </label>
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fa fa-video"></i>
                                            </span>
                                            <input type="file" name="video" accept="video/*" 
                                                   class="form-control input-circle-right"></div>
                                    </div>
                                </div>

                                


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.description') </label>

                                    <textarea required class="form-control ckeditor" name="description"
                                              rows="5">{!! $base->description !!}</textarea>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.google_maps_iframe') </label>
                                    <input type="text" name="iframe" class="form-control input-circle-right"
                                           value="{{ $base->iframe }}"></div>

                                </div>
                            </div>


                        <div class="form-actions">
                            <button type="submit" class="btn blue">@lang('site.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('script')

    <script src="{{ aurl() }}/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

@endsection


