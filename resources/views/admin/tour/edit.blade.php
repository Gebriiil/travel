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
                <a href="{{ route('admin.get.tour.index') }}" class="active-bread">@lang('site.tours')</a>
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
        <h3> @lang('site.edit') / {{$row->name}}</h3>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">


                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @lang('site.addItem') </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <form role="form" method="post" action="{{ route('admin.put.tour.update') }}"
                          enctype="multipart/form-data" class="">

                        <div class="form-body row">
                            @csrf
                            {{ method_field('PUT') }}
                            @include('admin.msg._errors')
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control input-circle-right "
                                               placeholder="Name" required value="{{ $row->name }}"></div>


                                    <input type="hidden" name="id" class="form-control input-circle-right "
                                              required value="{{ $row->id }}"></div>
                                </div>
                            </div>


                            <div class="col-sm-12">


                                <div class="form-group">
                                    <label> Category </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <select id="category-select" name="category_id"
                                                class="form-control select2">
                                            <option
                                                value="{{$row->subCategory->category->id}}">{{$row->subCategory->category->name}}</option>


                                            <optgroup label="All Categories">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </optgroup>


                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group" id="sub_category_container">
                                        <label> Sub Category </label>
                                        <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                            <select id="sub_category_id" name="sub_category_id"
                                                    class="form-control select2">
                                                <option
                                                    value="{{$row->subCategory->id}}">{{$row->subCategory->name}}</option>

                                            </select>

                                        </div>
                                    </div>




                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> @lang('site.price_start_from') </label>
                                            <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                                <input type="number" name="price_start_from"
                                                       class="form-control input-circle-right "
                                                       placeholder="Price Start From"
                                                       value="{{  $row->price_start_from }}"></div>
                                        </div>
                                    </div>

                                       
                                <div class="form-group col-sm-5">
                                    <label> Number Of Days </label>
                                    <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-text-width"></i>
                                </span>
                                        <input type="number" name="num_of_days" min="1"
                                               class="form-control input-circle-right "
                                               placeholder="Number Of Days" required
                                               value="{{ $row->num_of_days }}"></div>
                                </div>




                                    <div class="form-group">
                                        <label> Number of stars </label>
                                        <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                            <select id="num_of_stars" name="num_of_stars"
                                                    class="form-control select2">

                                                <option value="{{$row->num_of_stars}}"> {{$row->num_of_stars}}Stars
                                                </option>

                                                <optgroup label="All Options">
                                                    <option value="1">1 Star</option>
                                                    <option value="2">2 Stars</option>
                                                    <option value="3">3 Stars</option>
                                                    <option value="4">4 Stars</option>
                                                    <option value="5">5 Stars</option>
                                                    <option value="6">6 Stars</option>
                                                    <option value="7">7 Stars</option>
                                                </optgroup>

                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> @lang('site.image') Recommended : 400 * 300 </label>
                                            <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                                <input type="file" name="img" accept="image/*"
                                                       onchange="loadFile(event)"
                                                       class="form-control input-circle-right" ></div>
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
                                            <img id="output" class="privew-image"/>
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
                                                      rows="5">{{ $row->small_desc }}</textarea>

                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> @lang('site.description') </label>

                                            <textarea required class="form-control ckeditor" name="desc"
                                                      rows="5">{{ $row->desc }}</textarea>

                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Inclusion </label>

                                            <textarea required class="form-control ckeditor" name="inclusion"
                                                      rows="5">{{ $row->inclusion }}</textarea>

                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Exclusion </label>

                                            <textarea required class="form-control ckeditor" name="exclusion"
                                                      rows="5">{{ $row->exclusion }}</textarea>

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
                                    <button type="submit" class="btn blue">@lang('site.update')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ aurl() }}/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    @include('admin.ajax.update_tour')
@endsection







