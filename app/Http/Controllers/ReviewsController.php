<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\Posts;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class ReviewsController extends Controller
{
    // Hiển thị danh sách đánh giá
    public function index()
    {
        $reviews = Review::with('post')->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    // Hiển thị form thêm đánh giá
    public function create()
    {
        $posts = Post::all();
        return view('admin.reviews.create', compact('posts'));
    }

    // Lưu đánh giá mới
    public function store(Request $request)
    {
        $data = $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        Review::create($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Thêm đánh giá thành công!');
    }

    // Hiển thị form chỉnh sửa đánh giá
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $posts = Post::all();
        return view('admin.reviews.edit', compact('review', 'posts'));
    }

    // Cập nhật đánh giá
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $data = $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        $review->update($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Cập nhật đánh giá thành công!');
    }

    // Xóa mềm đánh giá
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Xóa đánh giá thành công!');
    }

    // Hiển thị đánh giá đã bị xóa mềm
    public function deleted()
    {
        $posts = Post::all();

        $deletedReviews = Review::onlyTrashed()->paginate(10);
        return view('admin.reviews.restore', compact('deletedReviews','posts'));
    }

    // Khôi phục đánh giá đã xóa mềm
    public function restore($id)
    {
        $review = Review::onlyTrashed()->findOrFail($id);
        $review->restore();

        return redirect()->route('admin.reviews.index')->with('success', 'Khôi phục đánh giá thành công!');
    }
}
