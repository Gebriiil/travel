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
                <a href="{{ route('admin.get.subCategory.index') }}"
                   class="active-bread">@lang('site.sub_categories')</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>@lang('site.edit')</span>
            </li>
        </ul>

    </div>
    <!-- END PAGE BAR -->





    <!-- END PAGE HEADER-->
    <div class="note note-info">
        <h3> @lang('site.editItem') ( @lang('site.sub_categories') ) </h3>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.editItem') </span>
                    </div>
                </div>
                <div class="portlet-body form">


                        <form role="form" id="form-edit" method="post" 
                        enctype="multipart/form-data">
                        <img src="{{ aurl() }}/images/giphy.gif" style="display: none" id="coverloading" >

                        <div class="form-body row">
                            @csrf
                            {{ method_field('PUT') }}
                            @include('admin.msg._errors')


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.category') </label>
                                    <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fa fa-text-width"></i>
                                            </span>
                                        <select class="form-control" name="category_id" required>
                                            <option value="{{$row->category->id}}">{{$row->category->name}}</option>

                                            <optgroup label="All Categories">
                                                @foreach($categories as $cat)
                                                    <option
                                                        value="{{ $cat->id }}" {{ printSelect($cat->id,$row->category_id) }} >{{ $cat->name }}</option>
                                                @endforeach
                                            </optgroup>

                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control input-circle-right"
                                               placeholder="Name" required value="{{ $row->name }}">
                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.image') Recommended : 370 * 250</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                        <input type="file" name="img" accept="image/*" onchange="loadFile(event)"
                                               class="form-control input-circle-right">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> Cover (Optional) Recommended : 1100 * 600</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                        <input type="file" name="cover" accept="image/*" onchange="loadFile(event)"
                                               class="form-control input-circle-right"></div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <img id="output" class="privew-image"
                                         @if($row->img) src="  {{ getImage(SUBCATEGORY_PATH.$row->img) }}" @endif />
                                </div>
                            </div>


                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> Image Title </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="img_title" class="form-control input-circle-right "
                                                 value="{{ $row->img_title }}"></div>
                                </div>
                            </div>


                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> Image Alt </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="img_alt" class="form-control input-circle-right "
                                                 value="{{ $row->img_alt }}"></div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> Cover Title </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="cover_title" class="form-control input-circle-right "
                                                 value="{{ $row->cover_title }}"></div>
                                </div>
                            </div>


                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> Cover Alt </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="cover_alt" class="form-control input-circle-right "
                                                 value="{{ $row->cover_alt }}"></div>
                                </div>
                            </div>




                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> Small Describtion </label>

                                    <textarea required class="form-control" name="small_desc"
                                              rows="5">{!! $row->small_desc !!}</textarea>

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.description') </label>

                                    <textarea required class="form-control ckeditor" name="desc"
                                              rows="5">{!! $row->desc !!}</textarea>

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.slug') / @lang('site.seo')  </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="slug" class="form-control input-circle-right "
                                               value="{{ $row->slug }}"></div>
                                </div>
                            </div>


                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn red">@lang('site.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection




@section('script')

    <script src="{{ aurl() }}/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <?php $route =  route('admin.put.subCategory.update');  ?>
    @include('admin.inc.ajax.update')

@endsection
