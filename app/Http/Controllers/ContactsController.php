<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::paginate(10); 
        return view('admin.contacts.index', compact('contacts'));
    }
    public function create()
    {
        $contacts = Contact::all();

        return view('admin.contacts.create', compact('contacts'));
    }
    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'ten' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'tin_nhan' => 'required|string|max:500',
        ]);
        Contact::create($dataValidate);
        return redirect()->route('admin.contacts.index')->with('success', 'thêm thành công!');
    }
    public function edit($id)
    {
        $contacts = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contacts'));
    }
    public function update(Request $request, $id)
    {
        $contacts = Contact::findOrFail($id);

        $dataValidate = $request->validate([
            'ten' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            
            'tin_nhan' => 'required|string|max:500',
        ]);
      
        $contacts->update($dataValidate);
        return redirect()->route('admin.contacts.index')->with('success', 'sửa  thành công!');
    }
    public function destroy($id)
    {
        $contacts = Contact::findOrFail($id);
        if ($contacts->hinh_anh) {
            Storage::disk('public')->delete($contacts->hinh_anh);
        }
        $contacts->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'xóa thành công!');
    }
    public function deleted()
    {
        $contacts = Contact::onlyTrashed()->paginate(10);

        return view('admin.contacts.restore', compact('contacts'));
    }

    public function restore($id)
    {
        $contacts = Contact::onlyTrashed()->findOrFail($id); // Chỉ lấy sản phẩm đã bị xóa mềm
        $contacts->restore(); // Khôi phục sản phẩm

        return redirect()->route('admin.contacts.index')->with('success', 'Khôi phục thành công!');
    }
}
