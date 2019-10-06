<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use App\Models\Tour;
use App\Models\City;
use Illuminate\Http\Request;


class SubCategoryController extends ParentController
{

    public function index($categorySlug, $subSlug)
    {

        // check if this category exist or not
        $category = Category::where('slug', $categorySlug)->first();
        //$childs = SubCategory::where('category_id', $category->id)->get();

        $subCategory= SubCategory::where('slug', $subSlug)->first();
        if ($subCategory) {
            $data['category'] = $category;
            $data['sub_category'] = $subCategory;
           // $data['childs'] = $childs;
            $data['tours'] = Tour::where('sub_category_id', $subCategory->id)->paginate(15);
            return view('front.tour.tours')->with($data);
        }
        return redirect(url('/'));
    }


    public function filter($categorySlug, $subSlug, Request $request)
    {
        // check if this category exist or not
        $category = Category::where('slug', $categorySlug)->first();
        $childs = SubCategory::where('category_id', $category->id)->get();

        $check = SubCategory::where('slug', $subSlug)->first();
        if ($check) {
            $data['category_slug'] = $categorySlug;
            $data['sub_category'] = $check;
            $data['childs'] = $childs;

            $query = Tour::
            where('sub_category_id', $check->id);

            if (isset($request->range)) {

                $arr = explode(";", $request->range);
                if (is_array($arr)) {
                    $from = $arr[0];
                    $to = $arr[1];

                    if ($from > 0) {
                        $query->where('price_start_from', '>=', getPriceInDollar($from));
                    }

                    if ($to > 0) {
                        $query->where('price_start_from', '<=',getPriceInDollar($to));
                    }
                }
            }

            if (isset($request->sort_price)) {

                if ($request->sort_price == "highest") {
                    $query->orderBy('price_start_from', 'desc');
                } else if ($request->sort_price == "lowest") {
                    $query->orderBy('price_start_from', 'asc');
                }
            }

            if (isset($request->name)) {
                    $query->where('name', 'like' ,'%' .$request->name. '%');
            }


            if (isset($request->checkbox)) {
                if (is_array($request->checkbox)) {
                    $query->whereIn('sub_category_id', $request->checkbox);
                }
            }


            $data['tours'] = $query->paginate(15);

            $url = url()->current() . '?sort_price=' . $request->sort_price . '&range=' . $request->range;

            if (isset($request->checkbox)) {
                if (is_array($request->checkbox)) {

                    foreach ($request->checkbox as $item) {
                        $url = $url . '&checkbox=' . $item;
                    }

                }
            }

            //'&checkbox=' . $request->checkbox
            //paginate with custom url
            $data['tours']->withPath($url);


            return view('front.tour.tours')->with($data);
        }
        return redirect(url('/'));
    }


    public function searchTours(Request $request)
    {

        // check if this category exist or not
        // if (isset($request->category) && isset($request->sub_category)) {
        //     $category = Category::where('slug', $request->category)->first();
        //     $check = SubCategory::where('slug', $request->sub_category)->first();

        //     if (is_object($category)) {
        //         $childs = SubCategory::where('category_id', $category->id)->get();

        //         $data['category'] = $category;
        //         $data['sub_category'] = $check;
        //         $data['childs'] = $childs;


        //         if (is_object($check)) {
        //             $query = Tour::
        //             where('sub_category_id', $check->id);

        //             if (isset($request->from)) {
        //                 if ($request->from > 0) {
        //                     $query->where('price_start_from', '>=', $request->from);
        //                 }
        //             }


        //             if (isset($request->to)) {
        //                 if ($request->to > 0) {
        //                     $query->where('price_start_from', '<=', $request->to);
        //                 }
        //             }

        //             $data['tours'] = $query->paginate(15);

        //             $url = url()->current() . '?category=' . $request->category . '?sub_category=' . $request->sub_category . '&from=' . $request->from . '&to=' . $request->to;

        //             //paginate with custom url
        //             $data['tours']->withPath($url);

        //             return view('front2.tour.search_results')->with($data);
        //         }


        //     }


        // } else if (isset($request->category) && !isset($request->sub_category)) {
        //     $category = Category::where('slug', $request->category)->first();
        //     if (is_object($category)) {
        //         $childs = SubCategory::where('category_id', $category->id)->get();

        //         $data['category'] = $category;
        //         //$data['sub_category'] = $check;
        //         $data['childs'] = $childs;

        //         $childs_ids = [];
        //         foreach ($childs as $child) {
        //             array_push($childs_ids, $child->id);
        //         }

        //         $query = Tour::
        //         whereIn('sub_category_id', $childs_ids);

        //         if (isset($request->from)) {
        //             if ($request->from > 0) {
        //                 $query->where('price_start_from', '>=', $request->from);
        //             }
        //         }


        //         if (isset($request->to)) {
        //             if ($request->to > 0) {
        //                 $query->where('price_start_from', '<=', $request->to);
        //             }
        //         }

        //         $data['tours'] = $query->paginate(15);

        //         $url = url()->current() . '?category=' . $request->category . '&from=' . $request->from . '&to=' . $request->to;

        //         //paginate with custom url
        //         $data['tours']->withPath($url);

        //         return view('front2.tour.search_results')->with($data);
        //     }
        // } else {
        //     return redirect(url('/'));
        // }


        // return redirect(url('/'));
        $city=City::where('name',$request->destination)->first();
        if (isset($city)) {
            
                    
                   foreach($city->country->category as $cat){
                        foreach($cat->sub as $sub){
                            $tours=$sub->tours->where('price_start_from', '>=', $request->from);
                        }
                    } 
                
            
        }
        return view('front2.pages.tour.search_results',compact('tours'));
    }
}


