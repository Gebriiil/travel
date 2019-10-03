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
            <a href="{{ route('admin.get.category.index') }}" class="active-bread">@lang('site.language')</a>
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
    <h3> @lang('site.addItem') ( @lang('site.language') ) </h3>
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
                    <form role="form" method="post" action="{{ route('admin.post.language.store') }}" enctype="multipart/form-data" class="">

                        <div class="form-body row">
                           @csrf
                            @include('admin.msg._errors')
                           <div class="col-sm-4">
                               <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control input-circle-right" placeholder="Name" required value="{{ old('name') }}"> </div>
                                </div>
                           </div>

                            <div class="col-sm-4">
                               <div class="form-group">
                                    <label> @lang('site.symbole') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="symbol" class="form-control input-circle-right" placeholder="symbol" required value="{{ old('symbol') }}" > 
                                    </div>
                                </div>
                           </div>

                           <div class="col-sm-4">
                               <div class="form-group">
                                    <label> @lang('site.icon') Recommended : 100 * 100</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                        <input type="file" name="icon" required class="form-control input-circle-right"> </div>
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

@endsection


