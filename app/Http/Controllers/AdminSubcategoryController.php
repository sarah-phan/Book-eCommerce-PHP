<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminSubcategoryController extends Controller
{
    public function addSubcategory(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'subcategory_name' => ['required', 'string', 'max:255'],
        ]);

        $data = new SubCategory();
        $data->subcategory_id = (string) Str::uuid();
        $data->subcategory_name = $validatedData['subcategory_name'];
        $data->category_id = $request->category_id;
        $data->save();

        return redirect('/redirect/admin-subcategory-main')
            ->with('message', 'Add successfully');
    }

    public function showSubcategoryList()
    {
        $categories = Category::with('subcategory_table')->get();

        $data = $categories->flatMap(function ($category) {
            return $category->subcategory_table->map(function ($subcategory) use ($category) {
                return [
                    'category_id' => $category->category_id,
                    'category_name' => $category->category_name,
                    'subcategory_id' => $subcategory->subcategory_id,
                    'subcategory_name' => $subcategory->subcategory_name,
                ];
            });
        });
        return view('admin.admin-list', compact('data'));
    }

    public function showCategoryList()
    {
        $data = Category::all();
        return view('admin.addFunction.admin-add-subcategory', compact('data'));
    }


    public function getSubCategoryWithIdInfor($subcategory_id){
        $subcategory_with_id = SubCategory::find($subcategory_id);
        $category_data = Category::all();
        return view('admin.editFunction.admin-edit-subcategory', compact('subcategory_with_id', 'category_data'));
    }

    public function updateSubcategoryWithIdInfor(Request $request, $subcategory_id){
        $validatedData = $request->validate([
            'subcategory_name' => ['required', 'string', 'max:255'],
        ]);

        $subcategory_with_id = SubCategory::find($subcategory_id);
        $subcategory_with_id->subcategory_name = $validatedData['subcategory_name'];
        $subcategory_with_id->category_id = $request->category_id;

        $subcategory_with_id->save();

        return redirect('/redirect/admin-subcategory-main')->with('message', "Edit successfully");
    }

    public function deleteSubcategory($subcategory_id){
        $subcategory_with_id = SubCategory::find($subcategory_id);
        $subcategory_with_id->delete();
        return redirect('/redirect/admin-subcategory-main')->with('message', "Delete successfully");
    }
}
