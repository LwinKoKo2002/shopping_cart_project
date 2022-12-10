<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    public function index()
    {
        return view('backend.brand.index');
    }

    public function ssd()
    {
        $query = Brand::query();
        return DataTables::of($query)
        ->addColumn('plus-icon', function ($each) {
            return null;
        })
        ->editColumn('category_id', function ($each) {
            if ($each->category) {
                return $each->category->name;
            }
            return "-";
        })
        ->filterColumn('category_id', function ($query, $keyword) {
            $query->whereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            });
        })
        ->editColumn('brand_image', function ($each) {
            $brand_img = '';
            if ($each->get_image_path()) {
                $brand_img = '<img src="'.$each->get_image_path().'" class="product_img"/>';
            }
            return $brand_img;
        })
        ->editColumn('action', function ($each) {
            $edit_icon = '<a class="btn btn-warning edit-icon my-2 ml-xl-2 ml-lg-2 ml-md-2 ml-sm-0 ml-0" href="'.route('admin.brand.edit', $each->id).'">Edit</a>';
            $delete_icon = '<a class="btn btn-danger delete_btn ml-xl-2 ml-lg-2 ml-md-2 ml-sm-2 ml-2 delete-icon my-2" href="#" data-id="'.$each->id.'">Delete</a>';

            return "<div class='action'>" . $edit_icon . $delete_icon . "</div>";
        })
        ->editColumn('updated_at', function ($each) {
            return $each->updated_at->format('Y-m-d H:i:s');
        })
        ->rawColumns(['brand_image','action'])
        ->make(true);
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.brand.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $brand_img = null;
        if ($request->hasFile('brand_img')) {
            $brand_file = $request->file('brand_img');
            $brand_img_name = uniqid().'_'. time() . '.' .$brand_file->getClientOriginalExtension();
            Storage::disk('public')->put('brand/'.$brand_img_name, file_get_contents($brand_file));
            $brand_img = $brand_img_name;
        }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->category_id = $request->category_id;
        $brand->brand_image = $brand_img;
        $brand->save();
        return redirect()->route('admin.brand.index')->with(['success'=>'Successfully created.']);
    }


    public function edit(Brand $brand)
    {
        $categories = Category::all();
        return view('backend.brand.edit', [
            'brand'=>$brand,
            'categories'=>$categories
        ]);
    }

    
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $brand_img = $brand->brand_image;
        if ($request->hasFile('brand_img')) {
            Storage::disk('public')->delete('brand/'.$brand->brand_image);
            $brand_file = $request->file('brand_img');
            $brand_img_name = uniqid().'_'. time() . '.' .$brand_file->getClientOriginalExtension();
            Storage::disk('public')->put('brand/'.$brand_img_name, file_get_contents($brand_file));
            $brand_img = $brand_img_name;
        }

        $brand->name = $request->name;
        $brand->category_id = $request->category_id;
        $brand->brand_image = $brand_img;
        $brand->update();
        return redirect()->route('admin.brand.index')->with(['update'=>'Successfully updated.']);
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();
        Storage::disk('public')->delete('brand/'.$brand->product_iamge);
        return "success";
    }
}
