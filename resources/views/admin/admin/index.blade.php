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
            <a href="{{ route('admin.get.admin.index') }}" class="active-bread">@lang('site.admins')</a>
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
    <h3> @lang('site.view')  ( @lang('site.admins') ) </h3>
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
                                <a id="sample_editable_1_new" href="{{ route('admin.get.admin.add') }}" class="btn sbold green"> @lang('site.add')
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>






            @if($admins->count())
                    
                        <table class="table table-striped table-bordered table-hover table-checkable table-sort order-column column" id="sample_1">
                        <thead>
                            <tr>
      
                                <th> @lang('site.name') </th>
                                <th> @lang('site.email') </th>
                                <th> @lang('site.language') </th>
                                <th> @lang('site.actions') </th>

                            </tr>
                        </thead>
                        <tbody class="connected-sortable droppable-area1">
                            
                            @foreach($admins as $ad)

                             @if($ad->lang)
                                <tr class="odd gradeX draggable-item">
                    
                                    <td class="text-center"> {{ $ad->name }} </td>
                                    <td class="text-center"> {{ $ad->email }} </td>
                                    <td class="text-center"> {{ $ad->lang->name }} </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-sm green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> @lang('site.actions')
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">

                                                {!!show_potions('admin',$ad->id)!!}
                                           
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach

                        </tbody>
                        <hr>
                        
                    
                    </table>
                            
                
                        </form>
                  
              
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



@endsection