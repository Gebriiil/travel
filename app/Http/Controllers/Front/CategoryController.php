<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Front\ParentController;



Use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends ParentController
{

    public function index($categorySlug)
    {
        // check if this category exist or not 
        $category = Category::where('slug',$categorySlug)->first();

        if($category->sub()->count()>0)
        {
            $data['row'] = $category;
            $subs=$category->sub;
            
            return view('front2.pages.category_tours',compact('category','subs'));
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


