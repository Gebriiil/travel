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
                <a href="{{ route('admin.get.hotel.index') }}" class="active-bread">@lang('site.hotels')</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>@lang('site.add')</span>
            </li>
        </ul>

    </div>
    <!-- END PAGE BAR -->





    <!-- END PAGE HEADER-->
    <div class="note note-info">
        <h3> @lang('site.addItem') ( @lang('site.hotels') ) </h3>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">


                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.addItem') </span>
                    </div>
                </div>

                <div class="portlet-body form">
                        <form role="form"  id="form-add"
                        enctype="multipart/form-data" >
                        <img src="{{ aurl() }}/images/giphy.gif" style="display: none" id="coverloading" >
    
    
                        <div class="form-body row">
                            @csrf
                            @include('admin.msg._errors')
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control input-circle-right "
                                               placeholder="Name" required value="{{ old('name') }}"></div>
                                </div>
                            </div>

                            <div class="form-group col-sm-5">
                                    <label> City </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <select id="city_id" name="city_id"
                                                class="form-control select2">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach

                                        </select>

                                </div>
                            </div>


                            <div class="col-sm-5">
                                    <div class="form-group">
                                        <label> @lang('site.image') Recommended : 150 * 100</label>
                                        <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fa fa-image"></i>
                                            </span>
                                            <input type="file" name="img" accept="image/*" onchange="loadFile(event)"
                                                   class="form-control input-circle-right" required></div>
                                    </div>
                                </div>
                            <div class="col-sm-12">
                              

                           

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <img id="output" class="privew-image"/>
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
                                                 value="{{ old('img_title') }}"></div>
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
                                                 value="{{ old('img_alt') }}"></div>
                                </div>
                            </div>

            
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn blue">@lang('site.add')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('script')

    <script src="{{ aurl() }}/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <?php $route =  route('admin.post.hotel.store');  ?>
    @include('admin.inc.ajax.store')

@endsection


