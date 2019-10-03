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
                <a href="{{ route('admin.get.review.index') }}" class="active-bread">@lang('site.review')</a>
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
        <h3> @lang('site.editItem') ( @lang('site.review') ) </h3>
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

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control input-circle-right"
                                               placeholder="name" required value="{{ $row->name }}">
                                        <input type="hidden" name="id" value="{{ $row->id }}">
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
                                        <input type="text" name="title" class="form-control input-circle-right"
                                               placeholder="Title" required value="{{ $row->title }}">

                                            </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.image') Recommended : 128 * 128</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                        <input type="file" name="img" accept="image/*" onchange="loadFile(event)"
                                               class="form-control  input-circle-right"></div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <img id="output" class="privew-image img-thumbnail"
                                         @if($row->img) src="  {{ getImage(REVIEW_PATH.$row->img) }}" @endif />
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



                            

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.description') <span class="label label-success"></span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <textarea class="form-control count-text-desc-keywords" name="desc"
                                                  rows="4"> {{ $row->desc }} </textarea>

                                    </div>
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
     <?php $route = route('admin.put.review.update');  ?>
     @include('admin.inc.ajax.update')

     
@endsection

