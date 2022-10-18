<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class BrandController extends Controller
{
    public function index()
    {
      
        $brand = Brand::all();
        return view('admin/brand', compact('brand'));
    }

    public function indexAddBrand()
    {
        return view('admin/add-brand');
    }

    public function storeBrand(BrandRequest $request)
    {
        DB::beginTransaction();
        try {
            $adminInfo = Auth::user();
            $brand = new Brand();
            $brand->name = $request->name;
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
        return view('admin/edit-brand', $data);
    }

    public function updateBrand(BrandRequest $request)
    {
        try {
            Brand::where('id', $request->id)->update(['name' => $request->name]);
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