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
            <span> Package Pricing Tables</span>
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
                <form method="post" action="{{route('admin.post.tour.packagePricing.storePackagePricing')}}" id="form_sample_2" class="form-horizontal" novalidate="novalidate">


                    <div class="form-body row">
                        @csrf
                        @include('admin.msg._errors')
                        @include('admin.msg._messages')

                        <div class="form-group col-md-12">

                            <div class=" form-group">
                                <div class="col-md-12" id="dailyPricing_container">
                                    <table class="table table-striped table-bordered table-hover">

                                        <thead>
                                            <tr>
                                                <th class="text-center">Title</th>
                                            </tr>
                                            <tr>
                                                <th><input type="text" class="form-control" name="title" placeholder="Ex: Travel Pricing Table">
                                                </th>
                                            </tr>

                                            <tr>
                                                <th colspan="2" class="text-center"> <input type="text" class="form-control" name="summer_title" value="May - Sep">
                                                </th>

                                                <th colspan="2" class="text-center"> <input type="text" class="form-control" name="winter_title" value="October - April"> </th>
                                            </tr>

                                            <tr>
                                                <th class="text-center"> <input type="text" class="form-control" name="summer_single_title" value="Per person in single room"> </th>
                                                <td class="text-center"><input type="number" class="form-control" name="summer_single_price"></td>

                                                <th class="text-center"> <input type="text" class="form-control" name="winter_single_title" value="Per person in single room"> </th>
                                                <td class="text-center"><input type="number" class="form-control" name="winter_single_price"></td>

                                            </tr>

                                            <tr>

                                                <th class="text-center"> <input type="text" class="form-control" name="summer_double_title" value="Per person in double room"> </th>
                                                <td class="text-center"><input type="number" class="form-control" name="summer_double_price"></td>

                                                <th class="text-center"> <input type="text" class="form-control" name="winter_double_title" value="Per person in double room"> </th>
                                                <td class="text-center"><input type="number" class="form-control" name="winter_double_price"></td>



                                            </tr>
                                            <tr>

                                                <th class="text-center"> <input type="text" class="form-control" name="summer_triple_title" value="Per person in triple room"> </th>
                                                <td class="text-center"><input type="number" class="form-control" name="summer_triple_price"></td>


                                                <th class="text-center"> <input type="text" class="form-control" name="winter_triple_title" value="Per person in triple room"> </th>
                                                <td class="text-center"><input type="number" class="form-control" name="winter_triple_price"></td>

                                            </tr>


                                        </thead>
                                        <tbody class="connected-sortable droppable-area1">

                                            <tr>
                                                <th class="text-center"> City</th>
                                                <th class="text-center"> Hotels</th>
                                            </tr>
                                            <tr>


                                                <th><select id="city-select" name="city_id" class="form-control select2" multiple>
                                                        @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                        @endforeach
                                                    </select></th>


                                                <th><select name="hotels_id[]" id="hotel_id" class="form-control select2" multiple>

                                                    </select></th>


                                            </tr>


                                        </tbody>
                                        <hr>


                                    </table>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="col-md-offset-1 col-md-5">
                                    <button type="submit" class="btn green">Save</button>
                                </div>
                            </div>
                        </div>



                        <!--end messages-->
                        <input type="hidden" name="tour_id" value="{{$tour->id}}"></div>


                </form>

                <!--end Itinerary-->


                <!--VIEW TOUR ITINERARIES -->
                <table class="table table-striped table-bordered table-hover table-checkable table-sort order-column column" id="sample_1">
                    <thead>
                        <tr>

                            <th> </th>
                            <th class="text-center" colspan="6"> Summer</th>
                            <th class="text-center" colspan="6"> Winter</th>

                            <th> </th>

                        </tr>
                        <tr>

                            <th class="text-center"> Title</th>
                            <th class="text-center"> Single Title</th>
                            <th class="text-center"> Double Title</th>
                            <th class="text-center"> Triple Title</th>
                            <th class="text-center"> Single Price</th>
                            <th class="text-center"> Double Price</th>
                            <th class="text-center"> Triple Price</th>

                            <th class="text-center"> Single Title</th>
                            <th class="text-center"> Double Title</th>
                            <th class="text-center"> Triple Title</th>
                            <th class="text-center"> Single Price</th>
                            <th class="text-center"> Double Price</th>
                            <th class="text-center"> Triple Price</th>

                            <th class="text-center"> @lang('site.actions') </th>

                        </tr>
                    </thead>


                    <tbody class="connected-sortable droppable-area1">

                        @foreach($packagepricings as $cat)
                        <?php
                        $content = json_decode($cat->content);

                        ?>
                        <tr class="odd gradeX draggable-item">


                            <td class="text-center"> {{ $cat->title }} </td>
                            <td class="text-center"> {{ $content->summer_single_title }} </td>
                            <td class="text-center"> {{ $content->summer_double_title }} </td>
                            <td class="text-center"> {{ $content->summer_triple_title }} </td>
                            <td class="text-center"> {{ $content->summer_single_price }} </td>
                            <td class="text-center"> {{ $content->summer_double_price }} </td>
                            <td class="text-center"> {{ $content->summer_triple_price }} </td>

                            <td class="text-center"> {{ $content->winter_single_title }} </td>
                            <td class="text-center"> {{ $content->winter_double_title }} </td>
                            <td class="text-center"> {{ $content->winter_triple_title }} </td>
                            <td class="text-center"> {{ $content->winter_single_price }} </td>
                            <td class="text-center"> {{ $content->winter_double_price }} </td>
                            <td class="text-center"> {{ $content->winter_triple_price }} </td>






                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> @lang('site.actions')
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <a href="{{ route('admin.get.tour.packagePricing.delete',$cat->id) }}" class="btn btn-danger conform-delete">
                                            <i class="fa fa-times"></i> Delete
                                        </a>


                                        <a href="{{ route('admin.get.tour.packagePricing.edit',$cat->id) }}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i> Edit
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

<script src="{{aurl()}}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="{{aurl()}}/seoera/js/sortAndDataTable.js"></script>

@include('admin.ajax.tour_pricing_hotels')
@endsection