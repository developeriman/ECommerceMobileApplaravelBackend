<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\updateBrandRequest;

class BrandController extends Controller
{
    public function index()
    {
      
        $brand = Brand::with('category')->get();
        return view('admin/brand', compact('brand'));
    }

    public function indexAddBrand()
    {
        $category = Category::all(); 
        return view('admin/add-brand',compact('category'));
    }

    public function storeBrand(BrandRequest $request)
    {
        DB::beginTransaction();
        try {
            $adminInfo = Auth::user();
            $brand = new Brand();
            $brand->name = $request->name;
            $brand->category_id = $request->category_id;
            // $brand->user_id = $adminInfo->id;
            // $brand->email = $request->email;
            // $brand->contact_number = $request->contact_number;
            // $brand->address = $request->address;
            // if ($request->hasFile('logo')) {
            //     $file = $request->file('logo');
            //     $ext = $file->getClientOriginalExtension();
            //     $fileName = time() . '.' . $ext;
            //     $file->move('upload/logo', $fileName);
            // }
            // $brand->logo = $fileName;
            
            $brand->created_at = Carbon::now()->timestamp;
            $brand->created_by = $adminInfo->username;
            $brand->updated_by = $adminInfo->username;
            if ($brand->save()) {
                DB::commit();
                return redirect('admin/brand');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function indexEditBrand($id)
    {
        $data['brand'] = Brand::where('id', $id)->first();
        $data['category'] = Category::all();
        return view('admin/edit-brand', $data);
    }

    public function updateBrand(updateBrandRequest $request)
    {
        try {
            Brand::where('id', $request->id)->update([
                'name' => $request->name,
                'category_id' => $request->category_id
            ]);
            return redirect('admin/brand');
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    public function brandDelete($id)
    {
        Brand::findOrFail($id)->delete();
        return redirect('admin/brand');
    }
}