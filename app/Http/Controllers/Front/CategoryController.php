<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Front\ParentController;



Use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends ParentController
{

    public function index($categorySlug,$subCategorySlug)
    {
        // check if this category exist or not 
        $lang = current_lang();
        $category = Category::where('slug',$categorySlug)->first(); 
        if(isset($category->sub)){
            if($category->sub->count()>0)
            {
                $data['row'] = $category;
                $sub=$category->sub()->where('slug',$subCategorySlug)->first();
               $tours=$sub->tours;
                $tags=Tag::all();
               $categories=Category::where('language_id',  $lang->id)
                ->orderBy('id','name','img','img_alt')
                ->take(8)
                ->get();
                return view('front2.pages.subcategory_tours',compact('category','sub','tags','tours','categories'));
            }
        }
        return redirect(url('/'));
    }

    public function childs(Request $request)
    {
        $category=Category::where('slug', $request->slug)->first();
        $categories = SubCategory::
        where('language_id', lang_front())
            ->where('category_id', $category->id)
            ->orderBy('sort')
            ->get();
        return response()->json($categories);
    }

}


