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
                <span>@lang('site.add')</span>
            </li>
        </ul>

    </div>
    <!-- END PAGE BAR -->





    <!-- END PAGE HEADER-->
    <div class="note note-info">
        <h3> @lang('site.addItem') ( @lang('site.tours') ) </h3>
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
                    <form role="form" method="post" action="{{ route('admin.post.tour.store') }}"
                          enctype="multipart/form-data" class="">

                        <div class="form-body row">
                            @csrf
                            @include('admin.msg._errors')
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label> @lang('site.name') </label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control input-circle-right "
                                               placeholder="Name" required value="{{ old('name') }}"></div>
                                </div>
                            </div>

                            <div class="form-group col-sm-5">
                                <label> Category </label>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-text-width"></i>
                                    </span>
                                    <select id="category-select" name="category_id"
                                            class="form-control select2">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="form-group col-sm-5" id="sub_category_container">
                                <label> Sub Category </label>
                                <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-text-width"></i>
                                </span>
                                    <select id="sub_category_id" name="sub_category_id"
                                            class="form-control select2">


                                    </select>

                                </div>
                            </div>


                  
                            
                                <div class="form-group col-sm-5">
                                    <label> @lang('site.price_start_from') </label>
                                    <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-text-width"></i>
                                </span>
                                        <input type="number" name="price_start_from"
                                               class="form-control input-circle-right "
                                               placeholder="Price Start From" required
                                               value="{{ old('price_start_from') }}"></div>
                                </div>
                                <!-- City -->
                                <div class="form-group col-sm-5">
                                    <label> @lang('site.city') </label>
                                    <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-text-width"></i>
                                </span>
                                        <input type="text" name="city"
                                               class="form-control input-circle-right "
                                               placeholder="City" required
                                               value="{{ old('city') }}"></div>
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
                                               value="{{ old('num_of_days') }}"></div>
                                </div>


                                
                                <div class="form-group col-sm-5">
                                    <label> Number of stars </label>
                                    <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-text-width"></i>
                                    </span>
                                        <select id="num_of_stars" name="num_of_stars"
                                                class="form-control select2">
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Stars</option>
                                            <option value="3">3 Stars</option>
                                            <option value="4">4 Stars</option>
                                            <option value="5">5 Stars</option>
                                            <option value="6">6 Stars</option>
                                            <option value="7">7 Stars</option>
                                        </select>

                                    </div>
                                </div>



                                 <div class="col-sm-8">
                                        <div class="form-group">
                                            <label> @lang('site.image') Recommended : 400 * 300</label>
                                            <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-image"></i>
                                        </span>
                                                <input type="file" name="img" accept="image/*"
                                                       onchange="loadFile(event)"
                                                       class="form-control input-circle-right" required></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-8">
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
                                                         value="{{ old('img_title') }}"></div>
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
                                                         value="{{ old('img_alt') }}"></div>
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
                                                         value="{{ old('cover_title') }}"></div>
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
                                                         value="{{ old('cover_alt') }}"></div>
                                        </div>
                                    </div>

                                    
                                    
                                    
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label> Small Describtion </label>

                                            <textarea required class="form-control" name="small_desc"
                                                      rows="5">{{ old('small_desc') }}</textarea>

                                        </div>
                                    </div>




                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label> @lang('site.description') </label>

                                            <textarea required class="form-control ckeditor" name="desc"
                                                      rows="5">{{ old('desc') }}</textarea>

                                        </div>
                                    </div>

  

                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label> Inclusion </label>

                                            <textarea required class="form-control ckeditor" name="inclusion"
                                                      rows="5">{{ old('inclusion') }}</textarea>

                                        </div>
                                    </div>

                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label> Exclusion </label>

                                            <textarea required class="form-control ckeditor" name="exclusion"
                                                      rows="5">{{ old('exclusion') }}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>
                                                Breakfast
                                            </label>
                                            <input type="checkbox" class="form-control" name="breakfast" style="margin-left: 5px; width: 35px;" value="1" />
                                            <span></span>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>
                                                Wifi
                                            </label>
                                            <input type="checkbox" class="form-control" name="wifi" style="margin-left: 0; width: 40px;" value="1" />
                                            <span></span>

                                        </div>
                                    </div>



                                     

                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label> @lang('site.slug') / @lang('site.seo')  </label>
                                            <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-text-width"></i>
                                        </span>
                                                <input type="text" name="slug" class="form-control input-circle-right "
                                                       value="{{ old('slug') }}"></div>
                                        </div>
                                    </div>


                            <div class="col-sm-12">
                             

                                

                                <div class="form-actions">
                                    <button type="submit" name="save_and_exit" value="save_and_exit" class="btn blue">Save And Exit</button>
                                    <button type="submit" name="save_and_continue" value="save_and_continue"class="btn blue">Save And Continue</button>
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
    @include('admin.ajax.new_tour')

@endsection







