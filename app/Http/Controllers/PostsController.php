<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Reviews;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(5); 
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'tieu_de' => 'required|string|max:255|unique:posts,tieu_de',
            'bai_viet' => 'required|string',
            'tac_gia' => 'required|string|max:100',
            'trang_thai' => 'required|boolean',
        ]);

        Post::create($dataValidate);
        return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết thành công!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $dataValidate = $request->validate([
            'tieu_de' => 'required|string|max:255|unique:posts,tieu_de,' . $id,
            'bai_viet' => 'required|string',
            'tac_gia' => 'required|string|max:100',
            'trang_thai' => 'required|boolean',
        ]);

        $post->update($dataValidate);
        return redirect()->route('admin.posts.index')->with('success', 'Sửa bài viết thành công!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Xóa bài viết thành công!');
    }

    public function deleted()
    {
        $deletedPosts = Post::onlyTrashed()->paginate(10);
        return view('admin.posts.restore', compact('deletedPosts'));
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('admin.posts.index')->with('success', 'Khôi phục bài viết thành công!');
    }
}
