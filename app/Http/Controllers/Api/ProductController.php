<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
         // $products = Product::with('category')->get();
        //  $categories = Category::all();
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
        //  return response()->json($products, 200);
        return ProductResource::collection($products);
        //collection hiển thị danh sách
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $product = Product::create($dataValidate);

        return response()->json([
            'message' => 'thêm sản phẩm tc',
            'data' => new ProductResource($product),
            'status' => 201
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
   
        // return response()->json($product, 200);
        return new ProductResource($product);
    // return response()->json([
    //    'data' =>$product,
    //    'status'=>200,
    //    'message'=>'thanhcong' 
    // ]);
  

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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

        return response()->json([
            'message' => 'cập nhật sản phẩm tc',
            'data' => new ProductResource($product),
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::findOrFail($id);

        if($product->hinh_anh){
            Storage::disk('public')->delete($product->hinh_anh);
        }
        $product->delete();
        return response()->json([
            'message'=> 'xoá tc'
        ]);

    }
    
}
