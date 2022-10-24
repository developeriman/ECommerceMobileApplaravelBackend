<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use App\Models\InfoModule;
use Illuminate\Http\Request;
use App\Models\DescriptionModule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
    
        // $product = Product::all();

        $product = Product::with(['brand','seller', 'info_module', 'description_module'])->get();
        return view('admin/product', compact('product'));
    }

    public function indexAddProduct()
    {
        $product = Product::all();
        $seller = Seller::all();
        $brand = Brand::all();
        $info_module = InfoModule::all();
        $description_module = DescriptionModule::all();
        return view('admin/add-product',compact('product', 'brand', 'seller', 'info_module', 'description_module'));
    }

    public function storeProduct(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
   
            $product = new Product();

            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $ext = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;
                $file->move('upload/logo', $fileName);
                $product->product_image = $fileName;
            }

            if ($request->hasFile('product_banner_image')) {
                $file = $request->file('product_banner_image');
                $ext = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;
                $file->move('upload/logo', $fileName);
                $product->product_banner_image = $fileName;
            }
            $product->product_name = $request->product_name;
            $product->brand_id = $request->brand_id;
            $product->seller_id = $request->seller_id;
            $product->info_id = $request->info_id;
            $product->description_id = $request->description_id;
    
            if ($product->save()) {
                DB::commit();
                return redirect('admin/product');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function indexEditProduct($id)
    {
        $product= Product::where('id', $id)->first();
        $brand = Brand::orderBy('name')->get();
        $seller = Seller::orderBy('seller_name')->get();
        $info_module = InfoModule::orderBy('title')->get();
        $description_module = DescriptionModule::orderBy('desc_name')->get();
        return view('admin/edit-product', ['product' => $product, 
        'brand' => $brand,
        'seller' => $seller,
        'info_module' => $info_module,
        'description_module' => $description_module,
    ]);
    }

    public function updateProduct(ProductRequest $request)
    {
        try {
            Product::where('id', $request->id)->update([
                'product_name' => $request->product_name,
                'brand_id' => $request->brand_id,
                'seller_id'=> $request->seller_id,
                'info_id' => $request->info_id,
                'description_id' => $request->description_id
    
            ]);
            return redirect('admin/product');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function productDelete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('admin/product');
    }
    
}