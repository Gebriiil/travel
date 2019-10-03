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
            <a href="{{ route('admin.get.tour.index') }}" class="active-bread">
           Tours
            </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> Itineraries</span>
            <span> ( {{ $tour->name }} ) </span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->



    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    <!--start Itinerary-->
                    <form method="post" action="{{route('admin.post.tour.itinerary.moreItineraries')}}" id="form_sample_2" class="form-horizontal"
                          novalidate="novalidate">


                        <div class="form-body row" >
                        @csrf
                        @include('admin.msg._errors')
                        @include('admin.msg._messages')
                        <!--start Itinerary-->
                            <div class="form-group  margin-top-20 col-md-12">


                                <div class=" form-group">
                                    <div class="pull-right">
                                        <button type="submit" name="save_and_new_itinerary" value="save_and_new_itinerary" class="btn btn-danger new_itinerary" style="margin-bottom: 20px;" type="button"><i
                                                class="glyphicon glyphicon-plus"></i>
                                            Save And New Itinerary
                                        </button>
                                    </div>
                                    <div class="pull-right">
                                        <div class="col-md-offset-1 col-md-5">
                                            <button type="submit" name="save_and_new_gallary" value="save_and_new_gallary" class="btn green">Save and New Gallary</button>
                                        </div>

                                    </div>
                                    <div class="col-md-8" id="itinerary_container">
                                        <div class="input-group control-group-itinerary increment_itinerary  col-md-12">

                                            <div class="col-md-12">
                                                <label class="control-label col-md-2">Title
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="title"
                                                        ></div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 margin-top-20">
                                                <label class="control-label col-md-2">Describtion
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-9">

                                    <textarea class="form-control ckeditor" rows="3" name="desc"
                                              data-error-container="#editor1_error"></textarea>
                                                    <div id="editor1_error"></div>
                                                </div>
                                            </div>

                                        </div>
                                        {{--<div class="itinerary_clone hide">--}}
                                            {{--<div class="control-group-itinerary input-group" style="margin-top:10px">--}}
                                                {{--<label class="control-label col-md-2">Title--}}
                                                    {{--<span class="required" aria-required="true"> * </span>--}}
                                                {{--</label>--}}
                                                {{--<div class="col-md-10">--}}
                                                    {{--<div class="input-icon right">--}}
                                                        {{--<i class="fa"></i>--}}
                                                        {{--<input type="text" class="form-control" name="title[]"--}}
                                                        {{--></div>--}}
                                                {{--</div>--}}

                                                {{--<div class="margin-top-20">--}}
                                                    {{--<label class="control-label col-md-2 ">Describtion--}}
                                                        {{--<span class="required" aria-required="true"> * </span>--}}
                                                    {{--</label>--}}
                                                    {{--<div class="col-md-10 margin-top-10">--}}

                                            {{--<textarea class="form-control ckeditor" rows="6" name="desc[]"--}}
                                                      {{--data-error-container="#editor1_error"></textarea>--}}
                                                        {{--<div id="editor1_error"></div>--}}
                                                    {{--</div>--}}

                                                {{--</div>--}}


                                                {{--<div class="input-group-btn">--}}
                                                    {{--<button class="btn btn-danger remove_itinerary" type="button"><i--}}
                                                            {{--class="glyphicon glyphicon-remove"></i>--}}
                                                        {{--Delete--}}
                                                    {{--</button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}


                                    </div>
                                </div>
                            </div>
                            <!--end Itinerary-->

                            <!--end messages-->
                            <input type="hidden" name="tour_id" value="{{$tour->id}}"></div>



                </form>

                <!--end Itinerary-->



                    <!--VIEW TOUR ITINERARIES -->
                    <table class="table table-striped table-bordered table-hover table-checkable table-sort order-column column" id="sample_1">
                        <thead>
                        <tr>

                            <th> Title </th>
                            <th> @lang('site.actions') </th>

                        </tr>
                        </thead>
                        <tbody class="connected-sortable droppable-area1">

                        @foreach($itineraries as $cat)
                            <tr class="odd gradeX draggable-item">



                                <td class="text-center"> {{ $cat->title }} </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> @lang('site.actions')
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">
                                            <a href="{{ route('admin.get.tour.itinerary.delete',$cat->id) }}" class="btn btn-danger conform-delete">
                                                <i class="fa fa-times" ></i> Delete
                                            </a>



                                            <a href="{{ route('admin.get.tour.itinerary.edit',$cat->id) }}" class="btn btn-primary">
                                                <i class="fa fa-edit" ></i> Edit
                                            </a>




                                        </ul>
                                    </div>
                                </td>



                            </tr>
                        @endforeach

                        </tbody>
                        <hr>


                    </table>




                </div>
            </div>
        </div>
    </div>



@endsection



@section('script')
    <script src="{{ aurl() }}/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

    {{--@include('admin.ajax.tour_itinerary')--}}
@endsection



