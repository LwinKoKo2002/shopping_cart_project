<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProduct;
use App\Models\Brand;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('backend.product.index');
    }

    public function ssd()
    {
        $query = Product::with('brand');
        return DataTables::of($query)
        ->addColumn('brand_id', function ($each) {
            if ($each->brand) {
                return $each->brand->name;
            }
            return '-';
        })
        ->filterColumn('brand_id', function ($query, $keyword) {
            $query->whereHas('brand', function ($query) use ($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            });
        })
        ->editColumn('product_img', function ($each) {
            return '<img src="'.$each->get_image_path().'" alt="profie image"
              class="product_img">';
        })
        ->editColumn('selling_price', function ($each) {
            return number_format($each->selling_price) . "K";
        })
        ->editColumn('action', function ($each) {
            $edit_icon = '<a class="btn btn-warning edit-icon my-2 ml-xl-2 ml-lg-2 ml-md-2 ml-sm-0 ml-0" href="'.route('admin.product.edit', $each->id).'">Edit</a>';
            $delete_icon = '<a class="btn btn-danger delete_btn ml-xl-2 ml-lg-2 ml-md-2 ml-sm-2 ml-2 delete-icon my-2" href="#" data-id="'.$each->id.'">Delete</a>';

            return "<div class='action'>" . $edit_icon . $delete_icon . "</div>";
        })
        ->editColumn('updated_at', function ($each) {
            return $each->updated_at->format('Y-m-d H:i:s');
        })
        ->rawColumns(['product_img','action'])
        ->make(true);
    }

    public function create()
    {
        $brands = Brand::all();
        return view('backend.product.create', compact('brands'));
    }

  
    public function store(StoreProduct $request)
    {
        if ($request->selling_price < 1000) {
            return back()->withErrors(['price'=>'Your price must be at least 1000 Kyats.']);
        }
        if ($request->quantity < 1) {
            return back()->withErrors(['quantity'=>'Your quantity must be at least 1.']);
        }
       
        $product_image = "";
        if ($request->hasFile('product_img')) {
            $product_file = $request->file('product_img');
            $product_image = uniqid().'_'. time() . '.' .$product_file->getClientOriginalExtension();
            Storage::disk('public')->put('product/'. $product_image, file_get_contents($product_file));
        }
        $product = new Product();
        $product->brand_id = $request->brand_id;
        $product->product_img=$product_image;
        $product->product_name = $request->product_name;
        $product->screen_size = $request->screen_size;
        $product->ram = $request->ram;
        $product->back_camera = $request->back_camera;
        $product->front_camera = $request->front_camera;
        $product->cpu = $request->cpu;
        $product->battery = $request->battery;
        $product->warranty = $request->warranty;
        $product->model = $request->model;
        $product->storage = $request->storage;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->trend = $request->trend;
        $product->save();
        return redirect()->route('admin.product.index')->with(['success'=>'Successfully created.']);
    }

 
    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('backend.product.edit', compact('brands', 'product'));
    }

    public function update(UpdateProduct $request, Product $product)
    {
        if ($request->selling_price < 1000) {
            return back()->withErrors(['price'=>'Your price must be at least 1000 Kyats.']);
        }
        $product_image = $product->product_img;
        if ($request->hasFile('product_img')) {
            Storage::disk('public')->delete('product/'.$product->product_img);
            $product_file = $request->file('product_img');
            $product_image = uniqid().'_'. time() . '.' .$product_file->getClientOriginalExtension();
            Storage::disk('public')->put('product/'. $product_image, file_get_contents($product_file));
        }
        $product->brand_id = $request->brand_id;
        $product->product_img=$product_image;
        $product->product_name = $request->product_name;
        $product->screen_size = $request->screen_size;
        $product->ram = $request->ram;
        $product->back_camera = $request->back_camera;
        $product->front_camera = $request->front_camera;
        $product->cpu = $request->cpu;
        $product->battery = $request->battery;
        $product->warranty = $request->warranty;
        $product->model = $request->model;
        $product->storage = $request->storage;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->trend = $request->trend;
        $product->update();
        return redirect()->route('admin.product.index')->with(['update'=>'Successfully updated.']);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        Storage::disk('public')->delete('product/'.$product->product_img);
        return "success";
    }
}
