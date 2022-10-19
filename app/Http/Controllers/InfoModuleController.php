<?php

namespace App\Http\Controllers;

use App\Models\InfoModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\InfoModuleRequest;

class InfoModuleController extends Controller
{
    public function index()
    {
        $info_module = InfoModule::all();
        return view('admin/info-module', compact('info_module'));
    }

    public function indexAddInfoModule()
    {

        return view('admin/add-info-module');
    }

    public function storeInfoModule(InfoModuleRequest $request)
    {
        DB::beginTransaction();
        try {
            $info_module = new InfoModule();
            $info_module->title = $request->title;
            $info_module->publisher = $request->publisher;
            $info_module->developer = $request->developer;
            $info_module->relase_date = $request->relase_date;
            $info_module->region = $request->region;
            $info_module->platform = $request->platform;
            $info_module->related_link = $request->related_link;
            if ($info_module->save()) {
                DB::commit();
                return redirect('admin/info-module');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function indexEditInfoModule($id)
    {
        $data['info_module'] = InfoModule::where('id', $id)->first();
        return view('admin/edit-info-module', $data);
    }

    public function updateInfoModule(Request $request)
    {
        try {
            InfoModule::where('id', $request->id)->update([
                'title' => $request->title,
                'publisher' => $request->publisher,
                'developer' => $request->developer,
                'relase_date' => $request->relase_date,
                'platform' => $request->platform,
                'region' => $request->region,
                'related_link' => $request->related_link,
            ]);
            return redirect('admin/info-module');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function deleteInfoModule($id)
    {
        InfoModule::findOrFail($id)->delete();
        return redirect('admin/info-module');
    }
}