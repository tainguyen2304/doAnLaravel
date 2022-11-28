<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products = $category->products()->get();
            return view('frontend.collections.products.index', compact('products', 'category'));
        } else {
            return redirect()->back();
        }
    }
    public function productsByBrand($category_slug, $params)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            if ($params == 'high-to-low') {
                $products =  Product::where('category_id', $category->id)->orderBy('selling_price', 'DESC')->where('status', '0')->get();
                return view('frontend.collections.products.index', compact('products', 'category'));
            } else if ($params == 'low-to-high') {
                $products =  Product::where('category_id', $category->id)->orderBy('selling_price', 'ASC')->where('status', '0')->get();
                return view('frontend.collections.products.index', compact('products', 'category'));
            } else {
                $products =  Product::where('category_id', $category->id)->where('brand', $params)->where('status', '0')->get();
                return view('frontend.collections.products.index', compact('products', 'category'));
            }
        } else {
            return redirect()->back();
        }
    }

    public function productDetail(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.collections.products.detail', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}