@extends('admin.main')

@section('style')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{aurl()}}/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{aurl()}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet"
          type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <link rel="stylesheet" type="text/css"
          href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection

@section('content')



    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">


        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('admin.get.home.index') }}" class="active-bread">@lang('site.home')</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('admin.get.reservation.index') }}" class="active-bread">Reservations</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>@lang('site.view')</span>
            </li>
        </ul>

    </div>
    <!-- END PAGE BAR -->



    <!-- END PAGE MESSAGE -->
    @include('admin.msg._messages')

    <!-- END PAGE HEADER-->
    <div class="note note-info">
        <h3> @lang('site.view') ( @lang('site.reservations') ) </h3>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body">



                    @if($reservations->count())
                        <form action="{{ route('admin.post.reservation.deleteMulti') }}" method="post"
                              id="Form2"> @csrf </form>

                        <table
                            class="table table-striped table-bordered table-hover table-checkable table-sort order-column column"
                            id="sample_1">
                            <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable"
                                               data-set="#sample_1 .checkboxes"/>
                                        <span></span>
                                    </label>
                                </th>
                                <th> Name</th>
                                <th> Date</th>
                                <th> Email</th>
                                <th> Phone</th>
                                <th> Nationality</th>
                                <th> Arrival</th>
                                <th> Departure</th>
                                <th> Adults # </th>
                                <th> Childrens # </th>
                                <th> Msg Body</th>
                                <th> @lang('site.actions') </th>

                            </tr>
                            </thead>
                            <tbody class="connected-sortable droppable-area1">

                            @foreach($reservations as $cat)
                                <tr class="odd gradeX draggable-item">
                                    <input type="hidden" name="sort[]" multiple value="{{ $cat->id }}" form="sortForm">
                                    <td class="text-center">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" name="deleteMulti[]" form="Form2"
                                                   multiple value="{{ $cat->id}}"/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="text-center"> {{ $cat->name }} </td>
                                    <td class="text-center"> {{ $cat->created_at }} </td>
                                    <td class="text-center"> {{ $cat->email }} </td>
                                    <td class="text-center"> {{ $cat->phone }} </td>
                                    <td class="text-center"> {{ $cat->nationality }} </td>
                                    <td class="text-center"> {{ $cat->arrival_date }} </td>
                                    <td class="text-center"> {{ $cat->departure_date }} </td>
                                    <td class="text-center"> {{ $cat->adult_number }} </td>
                                    <td class="text-center"> {{ $cat->children_number }} </td>
                                    <td class="text-center"> {{ $cat->message }} </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.get.reservation.delete',$cat->id) }}" class="btn btn-danger conform-delete">
                                                <i class="fa fa-times" ></i> Delete
                                            </a>

                                        </div>
                                    </td>


                                </tr>
                            @endforeach

                            </tbody>
                            <hr>


                        </table>


                        </form>
                        <button type="submit" class="btn btn-danger btn-sm item-checked"
                                form="Form2">@lang('site.deleteChecked')</button>


                        <!-- end form  -->

                    @else

                        @include('admin.msg.notFound')

                    @endif


                </div>

            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
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


@endsection
