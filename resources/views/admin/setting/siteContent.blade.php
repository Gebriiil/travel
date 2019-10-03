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
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs fa-4x"></i> @lang('site.siteContent') </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                               
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <ul class="nav nav-tabs tabs-left">
                                      
                                    
                                      <li   class="active">
                                          <a href="#home" data-toggle="tab"> Home </a>
                                      </li>
                                      <li class="">
                                          <a href="#tab_6_3" data-toggle="tab"> Contact Us </a>
                                      </li>
                                      <li class="">
                                          <a href="#tab_6_4" data-toggle="tab"> Tours Page </a>
                                      </li>
                                      <li class="">
                                          <a href="#tab_6_5" data-toggle="tab">View Tour </a>
                                      </li>
                                      <li class="">
                                          <a href="#tab_6_6" data-toggle="tab"> @lang('site.aboutPage') </a>
                                      </li> 
                                      <li class="">
                                          <a href="#tab_6_7" data-toggle="tab"> Search Page </a>
                                      </li>
                                 
                                  </ul>
                                </div>
                              
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                  <form method="post" enctype="multipart/form-data"  action="{{ route('admin.post.settings.updateSiteContent') }}" >
                                    @csrf
                                    
                                    <div class="tab-content">

                                
                                        <div class="tab-pane active" id="home">
                                            @include('admin.setting.inc._home')
                                        </div>
                                        <div class="tab-pane" id="tab_6_3">
                                            @include('admin.setting.inc._contact')
                                        </div>
                                        <div class="tab-pane" id="tab_6_4">
                                            @include('admin.setting.inc._category')
                                        </div>
                                        <div class="tab-pane" id="tab_6_5">
                                            @include('admin.setting.inc._tour')
                                        </div>
                                        <div class="tab-pane" id="tab_6_6">
                                            @include('admin.setting.inc._about')
                                        </div>
                                        <div class="tab-pane" id="tab_6_7">
                                            @include('admin.setting.inc._search')
                                        </div>

                                        
                                   
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success btn-block">@lang('site.save')</button>
                                      </div>
                                      
                                    </div>
                                  </form>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('script')

    <script src="{{ aurl() }}/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ aurl() }}/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->


        

@endsection


