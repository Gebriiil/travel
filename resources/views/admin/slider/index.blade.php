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
            <a href="{{ route('admin.get.slider.index') }}" class="active-bread">@lang('site.slider')</a>
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
    <h3> @lang('site.view') ( @lang('site.slider') ) </h3>
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
                                <a id="sample_editable_1_new" href="{{ route('admin.get.slider.add') }}" class="btn sbold green"> @lang('site.add')
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>




                @if($sliders->count())
               <form action="{{ route('admin.post.slider.deleteMulti') }}" method="post" id="Form2"> @csrf </form>
               <form action="{{ route('admin.post.slider.sort') }}" method="post" id="sortForm">@csrf</form>
                    
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
                                <th> @lang('site.description') </th>
                                <th> @lang('site.image') </th>
                                <th> @lang('site.actions') </th>
                                <th> @lang('site.seo') </th>

                            </tr>
                        </thead>
                        <tbody class="connected-sortable droppable-area1">
                            
                            @foreach($sliders as $sl)
                            <tr class="odd gradeX draggable-item">
                                <input type="hidden" name="sort[]" multiple value="{{ $sl->id }}" form="sortForm">
                                <td class="text-center">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" name="deleteMulti[]" form="Form2" multiple value="{{ $sl->id}}" />
                                        <span></span>
                                    </label>
                                </td>
                                <td class="text-center"> {{ $sl->title }} </td>
                                <td class="text-center">
                                    {{ $sl->description }}
                                </td>
                                <td class="text-center">
                                    <img src="{{ getImage(SLIDER_PATH.'small/'.$sl->img) }}" class="privew-image img-thumbnail">
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> @lang('site.actions')
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-left" role="menu">

                                            {!!show_potions('slider',$sl->id,$sl->status)!!}                
                                        </ul>
                                    </div>
                                </td>

                                <td class="text-center">  
                                  <a href="{{ route('admin.get.slider.seo',$sl->id) }}" class="btn btn-sm blue"> @lang('site.seo') </a> 
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
