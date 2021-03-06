@extends('admin.main')

@section('style')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{aurl()}}/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{aurl()}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
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
            <a href="{{ route('admin.get.tour.index') }}" class="active-bread">@lang('site.tours')</a>
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
    <h3> @lang('site.view') ( @lang('site.tours') ) </h3>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
       
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a id="sample_editable_1_new" href="{{ route('admin.get.tour.add') }}" class="btn sbold green"> @lang('site.add')
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <!--
                         <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-print"></i> Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                         </div>
                         -->
                    </div>
                </div>




                @if($categories->count())
               <form action="{{ route('admin.post.tour.deleteMulti') }}" method="post" id="Form2"> @csrf </form>
               <form action="{{ route('admin.post.tour.sort') }}" method="post" id="sortForm">@csrf</form>
                    
                        <table class="table table-striped table-bordered table-hover table-checkable table-sort order-column column" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> @lang('site.name') </th>
                                <th> @lang('site.gallary') </th>
                                <th> @lang('site.itineraries') </th>
                                <th> Daily Pricings </th>
                                <th> Package Pricings </th>
                                <th> @lang('site.actions') </th>
                                <th> @lang('site.seo') </th>

                            </tr>
                        </thead>
                        <tbody class="connected-sortable droppable-area1">
                            
                            @foreach($tours as $cat)
                            <tr class="odd gradeX draggable-item">
                                <input type="hidden" name="sort[]" multiple value="{{ $cat->id }}" form="sortForm">
                                <td class="text-center">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" name="deleteMulti[]" form="Form2" multiple value="{{ $cat->id}}" />
                                        <span></span>
                                    </label>
                                </td>
                                <td class="text-center"> {{ $cat->name }} </td>
                                <td class="text-center"> <a href="{{route('admin.get.tour.image.addImages',$cat->id)}}"><h1><i class="fa fa-image"></i></h1></a> </td>
                                <td class="text-center"> <a href="{{route('admin.get.tour.itinerary.addItineraries',$cat->id)}}"><h1><i class="fa fa-print"></i></h1></a> </td>
                                <td class="text-center"> <a href="{{route('admin.get.tour.dailyPricing.addDailyPricing',$cat->id)}}"><h1><i class="fa fa-money"></i></h1></a> </td>
                                <td class="text-center"> <a href="{{route('admin.get.tour.packagePricing.addPackagePricing',$cat->id)}}"><h1><i class="fa fa-money"></i></h1></a> </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> @lang('site.actions')
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">

                                            {!!show_potions('tour',$cat->id,$cat->status)!!}

                                            @if($cat->show_in_special_offers=='no')
                                                <li>
                                                    <a href="{{ route('admin.get.tour.showInOffers',$cat->id) }}"
                                                       class="confirm-show">
                                                        <i class="fa fa-eye"></i> Show In Offers </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ route('admin.get.tour.hideFromOffers',$cat->id) }}"
                                                       class="confirm-hide">
                                                        <i class="fa fa-eye"></i> Hide From Offers </a>
                                                </li>
                                            @endif


                                        </ul>
                                    </div>
                                </td>
                                <td class="text-center">  
                                  <a href="{{ route('admin.get.tour.seo',$cat->id) }}" class="btn btn-sm btn-primary"> @lang('site.seo') </a>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                        <hr>
                        
                    
                    </table>
                            
                
                        </form>
                    <button type="submit" class="btn btn-danger btn-sm item-checked" form="Form2">@lang('site.deleteChecked')</button>
              
                    <button  class="btn btn-info btn-sm pull-right sort" type="submit" form="sortForm" > @lang('site.sort') </button>
              
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
<script src="{{aurl()}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="{{aurl()}}/seoera/js/sortAndDataTable.js"></script>


@endsection
