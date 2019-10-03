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
                <a href="{{ route('admin.get.city.index') }}" class="active-bread">@lang('site.cities')</a>
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
        <h3> @lang('site.addItem') ( @lang('site.cities') ) </h3>
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


                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> Country </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <select id="country_id" name="country_id"
                                                class="form-control select2">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                            </div>


                            <div class="form-actions col-sm-12">
                                <button type="submit" class="btn blue">@lang('site.add')</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection



@section('script')
    <?php $route =  route('admin.post.city.store');  ?>
    @include('admin.inc.ajax.store')
@endsection



