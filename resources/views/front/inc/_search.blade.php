<!-- search -->
<div class="h4-group-check-room">
        <div class="container w-1192">
            <div class="sc-travel-search m-0">
                <div class="travel-search pt-5">
                    <div class="first-text"><span>{{ site_content($site_content,'find_your_trip') }}</span></div>
                    <form action="{{ route('front.get.search.tours') }}" method="GET" class="search-form clearfix">
                        <ul class="hb-form-table clearfix">
                            <li class="form-field category">
                                <select required id="category-select" name="category">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach
                                   
                                </select>
                            </li>
                            <li class="form-field sub_category">
                                <select required id="sub_category_id" name="sub_category">
    
                                    
                                </select>
                            </li>
    
                            <li class="form-field check-in">
                                <input name="from"  required 
                                 type="text" placeholder="{{ site_content($site_content,'from') }}" />
                            </li>
    
                            <li class="form-field check-out">
                                <input name="to" required    type="text" placeholder="{{ site_content($site_content,'to') }}"  />
                            </li>
    
    
    
                        </ul>
                        <p class="hb-submit">
                            <button type="submit" class="submit">{{ site_content($site_content,'search') }}</button>
                        </p>
                    </form>
    
                </div>
            </div>
        </div>
    </div>
    
    