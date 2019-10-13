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
                <a href="#" class="active-bread">@lang('site.tags')</a>
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
        <h3> @lang('site.addItem') ( @lang('site.tags') ) </h3>
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
                    <form role="form" action="{{route('admin.post.subcategory.tag')}}" method="POST" 
                          enctype="multipart/form-data" >
                          @csrf
                          <img src="{{ aurl() }}/images/giphy.gif" style="display: none" id="coverloading" >

                          
                        <div class="form-body row">
                            @include('admin.msg._errors')
                            <div class="col-sm-12">
                                    <div class="col-sm-6">
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
            
                            </div>
                            <div class="col-sm-12">
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label> @lang('site.desc') </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-text-width"></i>
                                                    </span>
                                                    <input type="text" name="desc" class="form-control input-circle-right "
                                                           placeholder="Name" required value="{{ old('desc') }}"></div>
                                            </div>
                                        </div>
            
                            </div>
                            


                            <div class="col-sm-12">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.image') Recommended : 100 * 100 </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                        <input type="file" name="image" accept="image/*" onchange="loadFile(event)"
                                               class="form-control input-circle-right" required></div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <img id="output" class="privew-image"/>
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


