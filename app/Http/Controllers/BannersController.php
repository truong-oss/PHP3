<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    public function index()
    {
        $banners = Banner::paginate(10); // Đúng, hỗ trợ phân trang
        return view('admin.banners.index', compact('banners'));
    }
    public function create()
    {
        return view('admin.banners.create');
    }
   
    public function store(Request $request)
    {
      
        $dataValidate = $request->validate([
            'tieu_de' =>'required|string',
            'image_url'=>'required|image|mimes:jpg,png,jpeg,gif',
            'trang_thai'=>'required|boolean',
        ]);
         //xử lý hình ảnh
        if($request->hasFile('image_url')){
            $image_urlPath=$request->file('image_url')->store('image_urls/products','public');
            $dataValidate['image_url']=$image_urlPath;
        }
        Banner::create($dataValidate);
        return redirect()->route('admin.banners.index')->with('success','thêm banner thành công!');
    }
    public function edit($id){
        $banners = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banners'));
    }
    public function update(Request $request,$id){
        $banners = Banner::findOrFail($id);

        $dataValidate = $request->validate([
            'tieu_de' =>'required|string',
            'image_url'=>'required|image|mimes:jpg,png,jpeg,gif',
            'trang_thai'=>'required|boolean',
        ]);
         //xử lý hình ảnh
        if($request->hasFile('image_url')){
            $image_urlPath=$request->file('image_url')->store('image_urls/products','public');
            $dataValidate['image_url']=$image_urlPath;
            if($banners->image_url){
                Storage::disk('public')->delete($banners->image_url);
            }
        }
        $banners->update($dataValidate);
        return redirect()->route('admin.banners.index')->with('success','sửa thành công!');
    }
    public function destroy($id){
        $banners = Banner::findOrFail($id);
        if($banners->image_url){
            Storage::disk('public')->delete($banners->image_url);
        }
        $banners->delete();
        return redirect()->route('admin.banners.index')->with('success','xóa banner thành công!');
    }
}
