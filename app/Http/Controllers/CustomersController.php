<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::paginate(10); 
        return view('admin.customers.index', compact('customers'));
    }
    public function create()
    {
        $customers = Customer::all();

        return view('admin.customers.create', compact('customers'));
    }
    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sdt' => 'required|string|max:15',
            'dia_chi' => 'required|string',
        ]);
        Customer::create($dataValidate);
        return redirect()->route('admin.customers.index')->with('success', 'thêm sản phẩm thành công!');
    }
    public function edit($id)
    {
        $customers = Customer::findOrFail($id);
        return view('admin.customers.edit', compact('customers'));
    }
    public function update(Request $request, $id)
    {
        $customers = Customer::findOrFail($id);

        $dataValidate = $request->validate([
           'ten' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sdt' => 'required|string|max:15',
            'dia_chi' => 'required|string',
        ]);
        
        $customers->update($dataValidate);
        return redirect()->route('admin.customers.index')->with('success', 'sửa thành công!');
    }
    public function destroy($id)
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();
        return redirect()->route('admin.customers.index')->with('success', 'xóa thành công!');
    }
    public function deleted()
    {
        $customers = Customer::onlyTrashed()->paginate(10);

        return view('admin.customers.restore', compact('customers'));
    }

    public function restore($id)
    {
        $customers = Customer::onlyTrashed()->findOrFail($id); // Chỉ lấy sản phẩm đã bị xóa mềm
        $customers->restore(); // Khôi phục sản phẩm

        return redirect()->route('admin.customers.index')->with('success', 'Khôi phục thành công!');
    }
}
