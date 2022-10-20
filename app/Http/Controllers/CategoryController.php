<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {

        $category = Category::all();
        return view('admin/category', compact('category'));
    }

    public function indexAddCategory()
    {
        return view('admin/add-category');
    }

    public function storeCategory(CategoryRequest $request)
    {
        DB::beginTransaction();
        try {
       
            $category = new Category();
            $category->category_name= $request->category_name;
          
            if ($request->hasFile('category_icon')) {
                $file = $request->file('category_icon');
                $ext = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;
                $file->move('upload/logo', $fileName);
                $category->category_icon = $fileName;
            }
          
            if ($category->save()) {
                DB::commit();
                return redirect('admin/category');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function indexEditCategory($id)
    {
        $category= Category::where('id', $id)->first();
 
        return view('admin/edit-category', compact('category'));
    }

    public function updateCategory(CategoryRequest $request)
    {
        $category = new Category();
        try {
            if ($request->hasFile('category_icon')) {
                $path = 'upload/logo' . $category->category_icon;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            //for image
            $file = $request->file('category_icon');
            $ext = $file->getClientOriginalExtension();
            $fileName_image = time() . '.' . $ext;
            $file->move('upload/logo', $fileName_image);
            Category::where('id', $request->id)->update([
                'category_name' => $request->category_name,
                'category_icon'=>$request->category_icon
            ]);
            return redirect('admin/category');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function CategoryDelete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('admin/category');
    }
}