<?php

namespace App\Http\Controllers;

use Whoops\Run;
use App\Models\Seller;
use App\Models\Attribute;
use App\Models\InfoModule;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use App\Models\DescriptionModule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductAttributeRequest;

class ProductAttributeController extends Controller
{
    public function index()
    {
        $product_attributes =DB::table('tbl_product_attribute')->get();

        foreach($product_attributes as $value){
            $product_attributes_values = DB::table('tbl_attribute_values')->where('attribute_id',$value->id)->get();
            $value->attributes_values = $product_attributes_values; 
        }
        // $product_atr  = DB::table('tbl_product_attribute')
        //     ->leftJoin('tbl_attribute_values', 'tbl_product_attribute.id', '=', 'tbl_attribute_values.attribute_id')
        //     ->select('tbl_product_attribute.*', 'tbl_attribute_values.value', 'tbl_attribute_values.price', 'tbl_attribute_values.stock')
        //     ->get();
     
        return view('admin/product_atr', compact('product_attributes'));
    }

    public function indexAddProductAttr()
    {
        $description_module = DescriptionModule::all();
        $seller = Seller::all();
        $description_module = DescriptionModule::all();
        $info_module = InfoModule::all();
        return view('admin/add-product_atr', compact('seller', 'description_module', 'info_module'));
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
        return view('admin/edit-product_atr', [
            'productAttribute' => $productAttribute,
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

    public function DeleteProductAttribute($id)
    {
        ProductAttribute::findOrFail($id)->delete();
        return redirect('admin/product_atr');
    }
    public function Setting($id)
    {
        $productAttribute = ProductAttribute::where('id', $id)->first();
        $productAttributeValue = AttributeValue::where('attribute_id', $id)->get();
        return view('admin/product_atr-setting', compact('productAttribute', 'productAttributeValue'));
    }

    // public function storeAttribute(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $productAttribute = new Attribute();
    //         $productAttribute->attribute_id = $request->attribute_id;
    //         if ($productAttribute->save()) {
    //             DB::commit();
    //             return redirect()->back();
    //         }
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return $e;
    //     }
    // }

    public function storeAttributeValue(Request $request)
    {
        DB::beginTransaction();
        try {
            $productAttribute = new AttributeValue();
            $productAttribute->attribute_id = $request->attribute_id;
            $productAttribute->value = $request->value;
            $productAttribute->price = $request->price;
            $productAttribute->stock = $request->stock;

            if ($productAttribute->save()) {
                DB::commit();
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function indexEditSettingAttributes($id)
    {
        $productAttributeValue = AttributeValue::where('id', $id)->first();
        return view('admin/edit-product_atr-setting', [
            'productAttributeValue' => $productAttributeValue]);
    }
    public function updateSettingAttributes(Request $request)
    {
        try {
            AttributeValue::where('id', $request->id)->update([
                'value' => $request->value,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
            return redirect('admin/product_atr');
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function DeleteSettingAttributes($id)
    {
        AttributeValue::findOrFail($id)->delete();
        return redirect()->back();
    }
}