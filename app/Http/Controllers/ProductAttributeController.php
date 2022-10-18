<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductAttributeRequest;

class ProductAttributeController extends Controller
{
    public function index()
    {

        $product_atr = ProductAttribute::all();
        return view('admin/product_atr', compact('product_atr'));
    }

    public function indexAddProductAttr()
    {
        $seller =Seller::all();
        return view('admin/add-product_atr',compact('seller'));
    }

    public function storeProductAttr(ProductAttributeRequest $request)
    {
        DB::beginTransaction();
        try {
            $productAttribute = new ProductAttribute();
            $productAttribute->name = $request->name;
            $productAttribute->seller_id = $request->seller_id;
         
            if ($productAttribute->save()) {
                DB::commit();
                return redirect('admin/product_atr');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function indexEditProductAttribute($id)
    {
        $data['productAttribute'] = ProductAttribute::where('id', $id)->first();
        return view('admin/edit-product_atr', $data);
    }

    public function updateProductAttribute(ProductAttributeRequest $request)
    {
        try {
            ProductAttribute::where('id', $request->id)->update(['name' => $request->name]);
            return redirect('admin/product_atr');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function brandDelete($id)
    {
        ProductAttribute::findOrFail($id)->delete();
        return redirect('admin/product_atr');
    }
    
}