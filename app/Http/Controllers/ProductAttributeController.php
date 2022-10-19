<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\InfoModule;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Models\DescriptionModule;
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
        $description_module = DescriptionModule::all();
        $seller = Seller::all();
        $description_module = DescriptionModule::all();
        $info_module = InfoModule::all();
        return view('admin/add-product_atr', compact('seller', 'description_module','info_module'));
    }

    public function storeProductAttr(ProductAttributeRequest $request)
    {
        DB::beginTransaction();
        try {
            $productAttribute = new ProductAttribute();
            $productAttribute->name = $request->name;
            $productAttribute->seller_id = $request->seller_id;
            $productAttribute->description_module_id = $request->description_module_id;
            $productAttribute->info_module_id = $request->info_module_id;
         
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
        $productAttribute = ProductAttribute::where('id', $id)->first();
        $seller = Seller::orderBy('seller_name')->get();
        $description_module = DescriptionModule::orderBy('desc_name')->get();
        $info_module = InfoModule::orderBy('title')->get();
        return view('admin/edit-product_atr', ['productAttribute' => $productAttribute,
         'seller' => $seller,
            'description_module' => $description_module,
            'info_module' => $info_module,
        ]);
    }

    public function updateProductAttribute(ProductAttributeRequest $request)
    {
        try {
            ProductAttribute::where('id', $request->id)->update([
                'name' => $request->name,
                'seller_id' => $request->seller_id,
                'description_module_id' => $request->description_module_id,
                'info_module_id' => $request->info_module_id,
            ]);
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