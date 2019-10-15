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
            <span>@lang('site.add')</span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->





<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3> @lang('site.add')  ( @lang('site.admins') ) </h3>
</div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.add') </span>
                    </div>
                </div>
                <div class="portlet-body form">
                        <img src="{{ aurl() }}/images/giphy.gif" style="display: none" id="coverloading" >


                    <form role="form" id="form-add" >
                        <div class="form-body row">
                           @csrf
                             @include('admin.msg._errors')

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> @lang('site.language') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <select class="form-control" name="language_id" required>
                                                <option value="">@lang('site.choose')</option>
                                           @foreach($languages as $lang)
                                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control input-circle-right" required value="{{ old('name') }}"> </div>
                                </div>
                            </div>


                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> @lang('site.email') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="email" class="form-control input-circle-right" required value="{{ old('email') }}"> </div>
                                </div>
                            </div>


                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> @lang('site.password') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control input-circle-right" required > </div>
                                </div>
                            </div>


                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> @lang('site.confirm_password') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="password" name="confirm_password" class="form-control input-circle-right" required > </div>
                                </div>
                            </div>
                            <!-- Permmitions -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>@lang('site.permissions')</label>
                                    <div class="nav-tabs-custom">
                                        <?php
                                            $models=['admins','categories','sub_categories','languages','cities','countries','hotels','tours','reviews','slider','settings','contacts','subscribers','reservations'];
                                            $maps=['read','add','edit','delete'];
                                        ?>
                                        <ul class="nav nav-tabs">
                                            @foreach( $models as $index=>$model)
                                            <li class="{{ $index == 0 ? 'active':'' }}"><a href="#{{$model}}" data-toggle="tab">@lang('site.' . $model)</a></li>
                                            @endforeach
                                        </ul>

                                        <div class="tab-content">
                                           @foreach($models as $index=>$model) 
                                            <div class="tab-pane {{ $index==0 ? 'active' : ''}}" id="{{$model}}">
                                                @if($model == 'settings' || $model == 'contacts'|| $model == 'subscribers'|| $model == 'reservations' )
                                                    <label><input type="checkbox" name="permissions[]" value="{{'manage ' . $model}}">@lang('site.manage')</label>
                                                @else
                                                    @foreach($maps as $map)
                                                        <label><input type="checkbox" name="permissions[]" value="{{$map . ' ' . $model}}">@lang('site.' . $map)</label>
                                                    @endforeach
                                                @endif
                                            </div>
                                           @endforeach
                                        </div><!-- end of tab content -->
                                        
                                    </div><!-- end of nav tabs -->
                                
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
    <?php $route =  route('admin.post.admin.store');  ?>
    @include('admin.inc.ajax.store')
@endsection


