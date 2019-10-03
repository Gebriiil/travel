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
                <span> Daily Pricing Tables</span>
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
                    <form method="post" action="{{route('admin.post.tour.dailyPricing.storeDailyPricing')}}"
                          id="form_sample_2" class="form-horizontal"
                          novalidate="novalidate">


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
                                                <th class="text-center"> Title</th>
                                            </tr>
                                            <tr>
                                                <th><input type="text" class="form-control" name="title" value="Prices Per Person"
                                                    >
                                                </th>
                                            </tr>

                                            <tr>
                        <th class="text-center"><input type="text" class="form-control" name="first_title" value="1 Person"> </th>
                        <th class="text-center"><input type="text" class="form-control" name="second_title" value="2 Persons"> </th>
                        <th class="text-center"><input type="text" class="form-control" name="third_title" value="3 Persons"> </th>
                        <th class="text-center"><input type="text" class="form-control" name="fourth_title" value="4 Persons"> </th>
                        <th class="text-center"><input type="text" class="form-control" name="fifth_title" value="5 Persons"> </th>
                        <th class="text-center"><input type="text" class="form-control" name="six_title" value="6 Persons"> </th>
                        <th class="text-center"><input type="text" class="form-control" name="seventh_title" value="+10 Persons"> </th>
                       
                        
                                            </tr>
                                            </thead>
                                            <tbody class="connected-sortable droppable-area1">


                                            <tr class="odd gradeX draggable-item">
                                                <td class="text-center"><input type="number" class="form-control"
                                                                               name="first_price"></td>
                                                <td class="text-center"><input type="number" class="form-control"
                                                                               name="second_price"></td>
                                                <td class="text-center"><input type="number" class="form-control"
                                                                               name="third_price"></td>
                                                <td class="text-center"><input type="number" class="form-control"
                                                                               name="fourth_price"></td>
                                                <td class="text-center"><input type="number" class="form-control"
                                                                               name="fifth_price"></td>
                                                <td class="text-center"><input type="number" class="form-control"
                                                                               name="six_price"></td>
                                                <td class="text-center"><input type="number" class="form-control"
                                                                               name="seventh_price"></td>

                                            </tr>


                                            <tr>
                                                <th class="text-center"> City</th>
                                                <th class="text-center"> Hotels</th>
                                            </tr>
                                            <tr>


                                                <th><select id="city-select" name="city_id"
                                                            class="form-control select2" multiple>
                                                        @foreach($cities as $city)
                                                            <option
                                                                value="{{$city->id}}">{{$city->name}}</option>
                                                        @endforeach
                                                    </select></th>


                                                <th><select name="hotels_id[]" id="hotel_id"
                                                            class="form-control select2" multiple>

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
                    <table
                        class="table table-striped table-bordered table-hover table-checkable table-sort order-column column"
                        id="sample_1">
                        <thead>
                        <tr>

                            <th class="text-center"> Title</th>
                            <th class="text-center">1st title</th>
                            <th class="text-center">2nd title</th>
                            <th class="text-center">3rd title</th>
                            <th class="text-center">4th title</th>
                            <th class="text-center">5th title</th>
                            <th class="text-center">6th title</th>
                            <th class="text-center">7th title</th>
                           
                            
                            <th class="text-center"> @lang('site.actions') </th>

                        </tr>
                        </thead>
                        <tbody class="connected-sortable droppable-area1">

                        @foreach($dailypricings as $cat)
                            <tr class="odd gradeX draggable-item">


                                <?php 
                                            $content = json_decode($cat->content);

                                    ?>
                                <td class="text-center"> {{ $cat->title }} </td>
                                <td class="text-center"> {{ $content->first_title }} </td>
                                <td class="text-center"> {{ $content->second_title }} </td>
                                <td class="text-center"> {{ $content->third_title }} </td>
                                <td class="text-center"> {{ $content->fourth_title }} </td>
                                <td class="text-center"> {{ $content->fifth_title }} </td>
                                <td class="text-center"> {{ $content->six_title }} </td>
                                <td class="text-center"> {{ $content->seventh_title }} </td>

                                

                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm green dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-expanded="false"> @lang('site.actions')
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">
                                            <a href="{{ route('admin.get.tour.dailyPricing.delete',$cat->id) }}"
                                               class="btn btn-danger conform-delete">
                                                <i class="fa fa-times"></i> Delete
                                            </a>


                                            <a href="{{ route('admin.get.tour.dailyPricing.edit',$cat->id) }}"
                                               class="btn btn-primary">
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
    <script src="{{aurl()}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

    <script type="text/javascript" src="{{aurl()}}/seoera/js/sortAndDataTable.js"></script>

    @include('admin.ajax.tour_pricing_hotels')
@endsection



