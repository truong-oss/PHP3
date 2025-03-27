<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index(Request $request){
        // $products = Product::with('category')->get();
        $categories = Category::all();
        $query = Product::with('category');
        if($request->filled('ma_san_pham')){
            $query->where('ma_san_pham', 'LIKE', '%' . $request->ma_san_pham. '%');
            //tương tự tìm kiếm sp theo tên sp, danh mục, khoảng giá, ngày nhập , trạng thái
        }
        if($request->filled('ten_san_pham')){
            $query->where('ten_san_pham', 'LIKE', '%' . $request->ten_san_pham. '%');
            //tương tự tìm kiếm sp theo tên sp, danh mục, khoảng giá, ngày nhập , trạng thái
        }
        // dd($products);
        //
        if ($request->filled('danh_muc')) {
            $query->where('category_id', $request->danh_muc); // Sử dụng ID danh mục
        }
        
        // Tìm kiếm theo khoảng giá chỉ dựa vào trường "gia"
        if ($request->filled('gia_min') && $request->filled('gia_max')) {
            $query->whereBetween('gia', [$request->gia_min, $request->gia_max]);
        } elseif ($request->filled('gia_min')) {
            $query->where('gia', '>=', $request->gia_min);
        } elseif ($request->filled('gia_max')) {
            $query->where('gia', '<=', $request->gia_max);
        }
        
        if ($request->filled('ngay_nhap')) {
            $query->whereDate('ngay_nhap', $request->ngay_nhap);
        }
        
        if ($request->filled('trang_thai')) {
            $query->where('trang_thai', $request->trang_thai);
        }
        $products = $query->orderBy('created_at', 'DESC')->paginate(6); // Phân trang 10 sản phẩm mỗi trang
        return view('admin.products.index', compact('products','categories'));
    }
    //xây dựng master layout trg qtri
    //tạo trag qli thông tin sp
    //thực hirnj hiển thị ds sản phảm ra bảng (có phân trag)
    public function show($id){
        // dd($id);
        //láy ra dl
        $product = Product::with('category')->findOrFail($id);
        // dd($product);

        //đổ dl thông tin chi tiết ra gd
        //$product->category->ten_danh_muc
        return view('admin.products.show', compact('product'));

    }
    // public function edit($id){
    //     // Lấy thông tin sản phẩm theo ID
    //     $product = Product::with('category')->findOrFail($id);
    
    //     // Lấy danh sách danh mục để hiển thị trong form chỉnh sửa
    //     $categories = Category::all();
    
    //     // Trả về view chỉnh sửa sản phẩm
    //     return view('admin.products.edit', compact('product', 'categories'));
    // }
    public function create(){
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $request){
        // dd($request);
        //khởi tạo 1 đối tượng product ms
        // $product = new Product();
        // //lấy dữ liệu từ form
        // $product->ma_san_pham = $request->ma_san_pham;
        // $product->ten_san_pham = $request->ten_san_pham;
        // $product->category_id = $request->category_id;
        // $product->gia = $request->gia;
        // $product->gia_khuyen_mai = $request->gia_khuyen_mai;
        // $product->so_luong = $request->so_luong;
        // $product->ngay_nhap = $request->ngay_nhap;
        // $product->mo_ta = $request->mo_ta;
        // $product->trang_thai = $request->trang_thai;

        // // sử lý hình ảnh
        // if($request->hasFile('hinh_anh')){
        //     $imagePath = $request->file('hinh_anh')->store('image/products', 'public');
        //     $product->hinh_anh = $imagePath;
        // }
        // //lưu sản phẩm
        // $product->save();






        //validate
        $dataValidate = $request->validate([
            'ma_san_pham' => 'required|string|max:20|unique:products,ma_san_pham',
            'ten_san_pham'=> 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'hinh_anh' => 'nullable|image|mimes:jpg,png,jpeg,gif',

            'gia'=>'required|numeric|min:0|max:99999999',
            'gia_khuyen_mai'=> 'nullable|numeric|min:0|lt:gia',
            'so_luong' =>  'required|integer|min:1',
           'ngay_nhap' => 'required|date_format:Y-m-d',

            'mo_ta' =>'nullable|string',
            'trang_thai' => 'required|boolean',
        ]);

 // // sử lý hình ảnh
        if($request->hasFile('hinh_anh')){
            $imagePath = $request->file('hinh_anh')->store('image/products', 'public');
            $dataValidate['hinh_anh']= $imagePath;
        }
        Product::create($dataValidate);

        return redirect()->route('admin.products.index')->with('success', 'thêm thành công');

    }
    public function edit($id){
     $product = Product::findOrFail($id);
     $categories = Category::all();
     return view('admin.products.edit', compact('product','categories'));
    }
    public function update(Request $request , $id){
        // dd($request);
     $product = Product::findOrFail($id);

        $dataValidate = $request->validate([
            'ma_san_pham' => 'required|string|max:20|unique:products,ma_san_pham,' .$id,
            'ten_san_pham'=> 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'hinh_anh' => 'nullable|image|mimes:jpg,png,jpeg,gif',

            'gia'=>'required|numeric|min:0|max:99999999',
            'gia_khuyen_mai'=> 'nullable|numeric|min:0|lt:gia',
            'so_luong' =>  'required|integer|min:1',
            'ngay_nhap' => 'required|date_format:Y-m-d',

            'mo_ta' =>'nullable|string',
            'trang_thai' => 'required|boolean',
        ]);

 // // sử lý hình ảnh
        if($request->hasFile('hinh_anh')){
            $imagePath = $request->file('hinh_anh')->store('image/products', 'public');
            $dataValidate['hinh_anh']= $imagePath;
            if($product->hinh_anh){
                Storage::disk('public')->delete($product->hinh_anh);
            }
        }
        $product->update($dataValidate);

        return redirect()->route('admin.products.index')-> with('success', 'sửa thành công');
    }
    public function destroy($id){
     $product = Product::findOrFail($id);

        if($product->hinh_anh){
            Storage::disk('public')->delete($product->hinh_anh);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'xoá thành công');
    }
}
