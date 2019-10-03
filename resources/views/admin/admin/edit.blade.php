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
            <a href="{{ route('admin.get.admin.index') }}" class="active-bread">@lang('site.admins')</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.edit')</span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->





<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3> @lang('site.edit')  ( @lang('site.admins') ) </h3>
</div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.edit') </span>
                    </div>
                </div>
                <div class="portlet-body form">

                    <form role="form" id="form-edit" method="post" >
                            <img src="{{ aurl() }}/images/giphy.gif" style="display: none" id="coverloading" >

                        <div class="form-body row">
                           @csrf
                             @include('admin.msg._errors')
                           {{ method_field('PUT') }}
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.language') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <select class="form-control" name="language_id" required>
                                                <option value="">@lang('site.choose')</option>
                                           @foreach($languages as $lang)
                                                <option value="{{ $lang->id }}" {{ printSelect($lang->id,$row->language_id) }}>{{ $lang->name }}</option>
                                           @endforeach
                                        </select>
                                        <input type="hidden" name="id" value="{{ $row->id }}"  >

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control input-circle-right" required value="{{ $row->name }}"> </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.email') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="email" class="form-control input-circle-right" required value="{{ $row->email }}"> </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.password') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control input-circle-right"  > </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.confirm_password') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="password" name="confirm_password" class="form-control input-circle-right"  > </div>
                                </div>
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
    <?php $route =  route('admin.put.admin.update');  ?>
    @include('admin.inc.ajax.update')
@endsection



