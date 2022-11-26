<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandFormRequest;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\ColorFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ColorsController extends Controller
{
    public function index()
    {
        return view('admin.colors.index');
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        $color = new Color;
        $color->name = $validatedData['name'];
        $color->code = $validatedData['code'];
        $color->save();
        return redirect('admin/colors')->with('message', 'Color Added Successfullt');
    }


    // public function delete($id)
    // {
    //     $brand = Brand::findOrFail($id);
    //     $brand->delete();
    //     return redirect('admin/brand')->with('message', 'Category Delete Successfullt');
    // }
}