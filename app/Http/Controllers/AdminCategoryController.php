<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
        ]);

        $data = new Category;
        $data->category_id = (string) Str::uuid();
        $data->category_name = $validatedData['category_name'];
        $data->save();

        return redirect('/admin-category-main')
            ->with('message', 'Add successfully');
    }

    public function showCategoryList()
    {
        $data = Category::all();
        return view('admin.admin-list', compact('data'));
    }

    public function getCategoryWithIdInfor($category_id){
        $category_with_id = Category::find($category_id);
        return view('admin.editFunction.admin-edit-category', compact('category_with_id'));
    }

    public function updateCategoryWithIdInfor(Request $request, $category_id){
        $validatedData = $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
        ]);

        $category_with_id = Category::find($category_id);
        $category_with_id->category_name = $validatedData['category_name'];

        $category_with_id->save();

        return redirect('/admin-category-main')->with('message', "Edit successfully");
    }

    public function deleteCategory($category_id){
        $category_with_id = Category::find($category_id);
        $category_with_id->delete();
        return redirect('/admin-category-main')->with('message', "Delete successfully");
    }
}
