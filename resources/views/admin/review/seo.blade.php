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
            <a href="{{ route('admin.get.slider.index') }}" class="active-bread">@lang('site.slider')</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.seo') </span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->


<!-- END PAGE MESSAGE -->
@include('admin.msg._messages')


<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3> @lang('site.slider') ( @lang('site.seo') ) </h3>
</div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">




                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.post.slider.updateSeo') }}"  class="">

                        <div class="form-body row">
                           @csrf
                            @include('admin.msg._errors')


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.seoData.altImage') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <textarea class="form-control" name="altImage" rows="4">{{ seoData($seoData,'altImage') }}</textarea>
                                        <input type="hidden" name="id" value="{{ $seo->id }}">

                                       
                                    </div>
                                </div>
                           </div>


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.seoData.titleImage') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <textarea class="form-control" name="titleImage" rows="4">{{ seoData($seoData,'titleImage') }}</textarea>
                                       
                                    </div>
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





