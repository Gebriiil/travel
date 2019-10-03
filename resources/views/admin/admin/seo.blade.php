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
            <a href="{{ route('admin.get.category.index') }}" class="active-bread">@lang('site.sub_categories')</a>
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
    <h3> @lang('site.sub_categories') ( @lang('site.seo') ) </h3>
</div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">




                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.post.subCategory.updateSeo') }}"  class="">

                        <div class="form-body row">
                           @csrf
                            @include('admin.msg._errors')


 

                          <div class="col-sm-6">
                               <div class="form-group">
                                    <label> @lang('site.seoData.metaTitle') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="metaTitle" class="form-control input-circle-right"   
                                        value=" {{ seoData($seoData,'metaTitle') }} "> 
                                    </div>
                                </div>
                           </div>

                           <div class="col-sm-6">
                               <div class="form-group">
                                    <label> @lang('site.seoData.metaKeywords') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                     
                                        <input type="text" name="metKeywords" class="form-control input-circle-right"   
                                        value="  {{ seoData($seoData,'metKeywords') }} "> 
                                        <input type="hidden" name="id" value="{{ $seo->id }}">
                                    </div>
                                </div>
                           </div>

                           


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.seoData.metaDescription') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <textarea class="form-control" name="metaDescription" rows="4"> {{ seoData($seoData,'metaDescription') }} </textarea>
                                       
                                    </div>
                                </div>
                           </div>


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.seoData.otherMetaTags') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <textarea class="form-control" name="otherMetaTags" rows="7">{{ seoData($seoData,'otherMetaTags') }}</textarea>
                                       
                                    </div>
                                </div>
                           </div>


                           <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.seoData.canonical') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <textarea class="form-control" name="canonical" rows="4">{{ seoData($seoData,'canonical') }}</textarea>
                                       
                                    </div>
                                </div>
                           </div>


                            <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.seoData.structureData') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <textarea class="form-control" name="structureData" rows="4">{{ seoData($seoData,'structureData') }}</textarea>
                                       
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


@section('script')

    <script src="{{ aurl() }}/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

@endsection


