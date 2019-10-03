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
            <a href="{{ route('admin.get.hotel.index') }}" class="active-bread">
            @lang('site.sub_categories')
            </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>@lang('site.images')</span>
            <span> ( {{ $hotel->name }} ) </span>
        </li>
    </ul>

</div>
<!-- END PAGE BAR -->





<!-- END PAGE HEADER-->
<div class="note note-info">
    <h3>  ( @lang('site.sub_categories') ) @lang('site.images') <span> ( {{ $hotel->name }} ) </span> </h3>
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
                    <form role="form" method="post" action="{{ route('admin.post.hotel.image.moreImages') }}" enctype="multipart/form-data" class="">

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
                                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                    </div>
                                </div>
                           </div>

                           <div class="col-sd-12">
                               <div class="gallery row"></div>
                           </div>

                        </div>

                        
                        <div class="form-actions">
                            <button type="submit" class="btn blue">@lang('site.add')</button>
                        </div>
                    </form>


                    <div class="tiles">

                        @foreach($images as $img)
                        <div class="tile image double selected">
                            <div class="tile-body">
                                <img src="{{ getImage(HOTEL_PATH.$img->img) }}" alt="">
                            </div>
                            <div class="tile-object view-img">
                                <div class="name"> </div>
                                <div class="number red"> 
                                    <a href="{{ route('admin.get.hotel.image.delete',$img->id) }}" class="red conform-delete" title="@lang('delete')">
                                        <i class="fa fa-times  red" ></i>
                                    </a>
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



