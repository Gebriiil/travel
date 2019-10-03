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




    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">


                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.put.tour.dailyPricing.update') }}"
                          enctype="multipart/form-data" class="">
                        <div class="form-body row">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id"
                                   value="{{ $row->id }}"></div>
                        @include('admin.msg._errors')
                        @include('admin.msg._messages')


                        <?php 
                        $content = json_decode($row->content);

                ?>
                        

                        <div class="form-group col-md-12">

                            <div class=" form-group">
                                <div class="col-md-12" id="dailyPricing_container">
                                    <table class="table table-striped table-bordered table-hover">

                                        <thead>
                                        <tr>
                                            <th class="text-center"> Title</th>
                                        </tr>
                                        <tr>
                                            <th><input type="text" class="form-control" name="title" value="{{$row->title}}"
                                                >
                                            </th>
                                        </tr>

                                        <tr>
                     <th class="text-center"><input type="text" class="form-control" name="first_title" value="{{ $content->first_title }}"> </th>
                     <th class="text-center"><input type="text" class="form-control" name="second_title" value="{{ $content->second_title }}"> </th>
                     <th class="text-center"><input type="text" class="form-control" name="third_title" value="{{ $content->third_title }}"> </th>
                     <th class="text-center"><input type="text" class="form-control" name="fourth_title" value="{{ $content->fourth_title }}"> </th>
                     <th class="text-center"><input type="text" class="form-control" name="fifth_title" value="{{ $content->fifth_title }}"> </th>
                     <th class="text-center"><input type="text" class="form-control" name="six_title" value="{{ $content->six_title }}"> </th>
                     <th class="text-center"><input type="text" class="form-control" name="seventh_title" value="{{ $content->seventh_title }}"> </th>

                                          
                     
                                          
                                            
                                        </tr>
                                        </thead>
                                        <tbody class="connected-sortable droppable-area1">


                                        <tr class="odd gradeX draggable-item">
                                            <td class="text-center"><input type="number" class="form-control"
                                                                           value="{{$content->first_price}}"    name="first_price"  class="text-center"></td>
                                            <td class="text-center"><input type="number" class="form-control"
                                                                           value="{{$content->second_price}}"  name="second_price"></td>
                                            <td class="text-center"><input type="number" class="form-control"
                                                                           value="{{$content->third_price}}" name="third_price"></td>
                                            <td class="text-center"><input type="number" class="form-control"
                                                                           value="{{$content->fourth_price}}" name="fourth_price"></td>
                                            <td class="text-center"><input type="number" class="form-control"
                                                                           value="{{$content->fifth_price}}"  name="fifth_price"></td>
                                            <td class="text-center"><input type="number" class="form-control"
                                                                           value="{{$content->six_price}}" name="six_price"></td>
                                            <td class="text-center"><input type="number" class="form-control"
                                                                           value="{{$content->seventh_price}}" name="seventh_price"></td>

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

                   
                        






                        <div>
                        </div>
                    </form>


<hr>
<hr>
                    <table
                        class=" table table-striped table-bordered table-hover table-checkable table-sort order-column column"
                        id="sample_1" >

                        <thead>
                        <tr>

                            <th> Name</th>
                            <th> City</th>
                            <th> @lang('site.actions') </th>

                        </tr>
                        </thead>
                        <tbody class="connected-sortable droppable-area1">

                        @foreach($rows as $row)
                            <tr class="odd gradeX draggable-item">


                                <td class="text-center"> {{ $row->hotel_name }} </td>
                                <td class="text-center"> {{ $row->city_name }} </td>

                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm green dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-expanded="false"> @lang('site.actions')
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">
                                            <a href="{{ route('admin.get.tour.dailyPricing.deleteHotel',$row->id) }}"
                                               class="btn btn-danger conform-delete">
                                                <i class="fa fa-times"></i> Delete
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



