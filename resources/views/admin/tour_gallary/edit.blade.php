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
                <a href="{{ route('admin.get.tour.image.addImages',$row->tour_id) }}" class="active-bread">@lang('site.images')</a>
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
        <h3> @lang('site.editItem') ( @lang('site.images') ) </h3>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.editItem') </span>
                    </div>
                </div>
                <div class="portlet-body form">
                   
                <form role="form" id="form-edit" method="post" 
                enctype="multipart/form-data">
                <img src="{{ aurl() }}/images/giphy.gif" style="display: none" id="coverloading" >



                        <div class="form-body row">
                            @csrf
                            {{ method_field('PUT') }}
                            @include('admin.msg._errors')

                           
                            
                            <input type="hidden" name="id" value="{{ $row->id }}">

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> Image Title </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="img_title" class="form-control input-circle-right "
                                                 value="{{ $row->img_title }}"></div>
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
                                                 value="{{ $row->img_alt }}"></div>
                                </div>
                            </div>


                           
                            


                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn red">@lang('site.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection



@section('script')
     <?php $route = route('admin.put.tour.image.update');  ?>
     @include('admin.inc.ajax.update')

     
@endsection
