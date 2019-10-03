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
                    <form role="form" method="post" action="{{ route('admin.put.tour.packagePricing.update') }}"
                          enctype="multipart/form-data" class="">

                        <div class="form-body row">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id"
                                   value="{{ $row->id }}"></div>
                        @include('admin.msg._errors')


                        
                        <?php 
                        $content = json_decode($row->content);

                ?>
                        
                        

                        <table class="table table-striped table-bordered table-hover">

                            <thead>
                            <tr>
                                <th class="text-center">Title</th>
                            </tr>
                            <tr>
                                <th><input type="text" class="form-control" name="title" value="{{$row->title}}"
                                    >
                                </th>
                            </tr>

                            <tr>
                                <th colspan="2" class="text-center"> <input type="text" class="form-control"
                                    name="summer_title" value="{{ $content->summer_title }}"> 
                                </th>

                                <th colspan="2" class="text-center"> <input type="text" class="form-control"
                                    name="winter_title" value="{{ $content->winter_title }}"> </th>
                            </tr>
                            
                            <tr>
                                <th class="text-center">  <input type="text" class="form-control" name="summer_single_title" value="{{ $content->summer_single_title }}"> </th>
                                <td class="text-center"><input type="number" class="form-control"
                                    value="{{$content->summer_single_price}}" name="summer_single_price"></td>

                                    <th class="text-center">  <input type="text" class="form-control" name="winter_single_title" value="{{ $content->winter_single_title }}"> </th>

                                    <td class="text-center"><input type="number" class="form-control"
                                        value="{{$content->winter_single_price}}"  name="winter_single_price"></td>
                            </tr>
                            <tr>
                                <th class="text-center">  <input type="text" class="form-control" name="summer_double_title" value="{{ $content->summer_double_title }}"> </th>
                                <td class="text-center"><input type="number" class="form-control"
                                    value="{{$content->summer_double_price}}"  name="summer_double_price"></td>

                                    <th class="text-center">  <input type="text" class="form-control" name="winter_double_title" value="{{ $content->winter_double_title }}"> </th>

                                    <td class="text-center"><input type="number" class="form-control"
                                        value="{{$content->winter_double_price}}" name="winter_double_price"></td>

                                    
                             
                                
                            </tr>
                            <tr>
                                <th class="text-center">  <input type="text" class="form-control" name="summer_triple_title" value="{{ $content->summer_triple_title }}"> </th>
                                      
                                <td class="text-center"><input type="number" class="form-control"
                                    value="{{$content->summer_triple_price}}"  name="summer_triple_price"></td>
    
                                
                                <th class="text-center">  <input type="text" class="form-control" name="winter_triple_title" value="{{ $content->winter_triple_title }}"> </th>
                                <td class="text-center"><input type="number" class="form-control"
                                    value="{{$content->winter_triple_price}}" name="winter_triple_price"></td>


                            </tr>
                            </thead>
                            <tbody class="connected-sortable droppable-area1">
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

                        <div class="col-sm-6">
                            <div class="form-actions">
                                <button type="submit" class="btn blue">Update</button>
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
                                            <a href="{{ route('admin.get.tour.packagePricing.deleteHotel',$row->id) }}"
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



