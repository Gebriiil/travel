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
                <span>@lang('site.edit')</span>
            </li>

        </ul>
    </div>
    <!-- END PAGE BAR -->





    <!-- END PAGE HEADER-->
    <div class="note note-info">
        <h3> @lang('site.edit') / {{$row->title}}</h3>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">


                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.put.tour.itinerary.update') }}"
                          enctype="multipart/form-data" class="">

                        <div class="form-body row">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id"
                                   value="{{ $row->id }}"></div>
                        @include('admin.msg._errors')
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label> Title </label>
                                <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                    <input type="text" name="title" class="form-control input-circle-right "
                                           placeholder="Title" required value="{{ $row->title }}"></div>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label> Describtion </label>
                                <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>

                                    <textarea name="desc"
                                              class="form-control input-circle-right ckeditor">{{ $row->desc }}</textarea>

                                </div>
                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn blue">Update</button>
                            </div>
                        </div>
                        <div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection







@section('script')
    <script src="{{ aurl() }}/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

    {{--@include('admin.ajax.tour_itinerary')--}}
@endsection




