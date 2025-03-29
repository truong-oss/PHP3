<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function index(){
      
        $categories = Category::paginate(6);  
     return view('admin.categories.index', compact('categories'));

    }
    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'ten_danh_muc' => 'required|string|max:20|unique:categories,ten_danh_muc',
            'trang_thai' => 'required|boolean',
        ]);
        Category::create($dataValidate);
        return redirect()->route('admin.categories.index')->with('success', 'thêm danh mục thành công!');
    }
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.categories.edit', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id);


        $dataValidate = $request->validate([
            'ten_danh_muc' => 'required|string|max:20|unique:categories,ten_danh_muc',
            'trang_thai' => 'required|boolean',
        ]);

        $categories->update($dataValidate);
        return redirect()->route('admin.categories.index')->with('success', 'sửa danh mục thành công!');
    }
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        return redirect()->route('admin.categories.index')->with('success', 'xóa danh mục sản phẩm thành công!');
    }
    public function deleted()
    {
        // dd(Category::withTrashed()->get());
       
        $deletedCategories = Category::onlyTrashed()->paginate(10);

        return view('admin.categories.restore', compact('deletedCategories'));
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id); // Lấy danh mục đã bị xóa mềm
        // dd($category);
        $category->restore(); // Khôi phục danh mục

        return redirect()->route('admin.categories.index')->with('success', 'Khôi phục danh mục sản phẩm thành công!');
    }
}
