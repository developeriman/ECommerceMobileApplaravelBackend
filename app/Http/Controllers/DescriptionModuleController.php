<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DescriptionModule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DescriptionRequest;

class DescriptionModuleController extends Controller
{
    public function index()
    {

        $description_module = DescriptionModule::all();
        return view('admin/description_module', compact('description_module'));
    }

    public function indexAddDesModule()
    {
        
        return view('admin/add-description_module');
    }

    public function storeDesModule(DescriptionRequest $request)
    {
        DB::beginTransaction();
        try {
            $description_module = new DescriptionModule();
            $description_module->desc_name = $request->desc_name;
            $description_module->long_desc = $request->long_desc;
            if ($description_module->save()) {
                DB::commit();
                return redirect('admin/description-module');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function indexEditDesModule($id)
    {
        $data['description_module'] = DescriptionModule::where('id', $id)->first();
        return view('admin/edit-description_module', $data);
    }

    public function updateDesModule(DescriptionRequest $request)
    {
        try {
            DescriptionModule::where('id', $request->id)->update([
                'desc_name' => $request->desc_name,
                'long_desc' => $request->long_desc
            ]);
            return redirect('admin/description-module');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function deleteDesModule($id)
    {
        DescriptionModule::findOrFail($id)->delete();
        return redirect('admin/description-module');
    }
}