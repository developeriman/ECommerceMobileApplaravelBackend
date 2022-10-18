<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SellerRequest;
use Illuminate\Http\Request;



class SellerController extends Controller
{
    public function index()
    {

        $seller = Seller::all();
        return view('admin/seller', compact('seller'));
    }

    public function indexAddSeller()
    {
        return view('admin/add-seller');
    }

    public function storeSeller(SellerRequest $request)
    {
        DB::beginTransaction();
        try {
            $seller = new Seller();
            $seller->store_name	 = $request->store_name;
            $seller->seller_name = $request->seller_name;
            $seller->email = $request->email;
            $seller->phone = $request->phone;
            $seller->password = $request->password;          
            if ($seller->save()) {
                DB::commit();
                return redirect('admin/seller');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function indexEditSeller($id)
    {
        $data['seller'] = Seller::where('id', $id)->first();
        return view('admin/edit-seller', $data);
    }

    public function updateSeller(Request $request)
    {
        try {
          
            Seller::where('id', $request->id)->update([
                    'store_name' => $request->store_name,
                    'seller_name' => $request->seller_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => $request->password,
            ]);
            return redirect('admin/seller');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function deleteSeller($id)
    {
        Seller::findOrFail($id)->delete();
        return redirect('admin/seller');
    }
}