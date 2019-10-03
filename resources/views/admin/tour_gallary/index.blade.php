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
            @lang('site.tours')
            </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.images')</span>
            <span> ( {{ $tour->name }} ) </span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->




<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3>  ( @lang('site.tours') ) @lang('site.images') <span> ( {{ $tour->name }} ) </span> </h3>
</div>





<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body"> Modal body goes here </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">


                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.images') </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.post.tour.image.moreImages') }}" enctype="multipart/form-data" class="">

                        <div class="form-body row">
                            @csrf
                            @include('admin.msg._errors')

                            <div class="col-sm-12">
                               <div class="form-group">
                                    <label> @lang('site.images') </label>
                                    <b class="field-required">*</b>

                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                        <input type="file" name="img[]" multiple accept="image/*" class="form-control input-circle-right" required id="gallery-photo-add"  > 
                                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                    </div>
                                </div>
                           </div>

                           <div class="col-sd-12">
                               <div class="gallery row"></div>
                           </div>

                        </div>

                        
                        <div class="form-actions">
                            <button type="submit" name="save_and_new_daily_pricing" value="save_and_new_daily_pricing" class="btn blue">Save And New Daily Pricing</button>
                            <button type="submit" name="save_and_new_package_pricing" value="save_and_new_package_pricing" class="btn blue">Save And New Package Pricing</button>
                            <button type="submit" name="save" value="save" class="btn red">Save</button>
                        </div>
                    </form>


                    <div class="tiles">

                        @foreach($images as $img)
                        <div class="tile image double selected">
                            <div class="tile-body">
                                <img src="{{ getImage(TOUR_PATH.$img->img) }}" alt="">
                            </div>
                            <div class="tile-object view-img">
                                <div class="name"> </div>
                                <div class="number red"> 
                                    <a href="{{ route('admin.get.tour.image.delete',$img->id) }}"
                                         class="red conform-delete" title="@lang('delete')">
                                        <i class="fa fa-times  red" ></i>
                                    </a>
                                    
                                    <a href="{{ route('admin.get.tour.image.edit',$img->id) }}"
                                         class="red" title="@lang('edit')">
                                        <i class="fa fa-edit  red" ></i>
                                    </a>
                                    
                                    {{--                                      
                                   <a class=" red " data-toggle="modal" href="#basic">
                                        <i class="fa fa-edit  red" ></i>
                                   </a>  --}}

                                  </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection



@section('script')

<script type="text/javascript">
    
    $(function() 
    {
        // Multiple images preview in browser placeToInsertImagePreview
        var imagesPreview = function(input) 
        {

            if (input.files) 
            {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) 
                {
                    var reader = new FileReader();

                    reader.onload = function(event) 
                    {
                        $("div.gallery").append('<div class="col-sm-2 pip"><img src="'+event.target.result+'" /> </div>');
           
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function() 
        {
             $("div.gallery").html('')
            imagesPreview(this);

        });





    });




</script>


@endsection



