<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function createAccount()
    {
        return view('admin.listAccount.register');
    }

    
    public function listAccount()
    {
        $data = User::all();
        return view('admin.listAccount.index',['users'=>$data]);
    }

    // Crud Category
    public function indexCategory(){
        $categories = Category::all();
        
        return view('admin.category.indexCategory', compact('categories'));
    }
    // public function showCategory($id)
    // {
    //     $data = Category::findOrFail($id);
    //     return view('admin.category.showCategory',compact('data'));
    // }
    
    public function createCategory(){
        return view('admin.category.createCategory');
    }
    public function storeCategory(Request $request){
        // dd($request);

        $input = $request->all();
        // dd($input);

        // Tạo mới category với các dữ liệu tương ứng với dữ liệu được gán trong $data
        Category::create($input);
        echo"Successfully Create Category";
        return redirect('admin/category/index');
    }

    public function editCategory($id){
        //find id to update
        $dataCategory = Category::findOrFail($id);
        return view('admin.category.editCategory', compact('dataCategory'));
    }

    public function updateCategory(Request $request, $id){
        $dataCategory = Category::findOrFail($id);
        // assign information to data variable
        $data = $request -> all();
        $dataCategory->update($data);
        return redirect('admin/category/index');
    }

    public function deleteCategory($id)
    {
        $data = Category::findOrFail($id);
        $data -> delete();
        return redirect('admin/category/index')->with('flash_message', 'Category deleted!');  
    }

    public function edit()
    {
        return view('admin.listAccount.edit');
    }

    // Crud Department

    public function indexDepartment(){
        $departments = Department::all();
        
        return view('admin.department.indexDepartment', compact('departments'));
    }

    public function createDepartment()
    {
        return view('admin.department.createDepartment');
    }

    public function storeDepartment(Request $request){
        // dd($request);

        $input = $request->all();
        // dd($input);

        // Tạo mới category với các dữ liệu tương ứng với dữ liệu được gán trong $data
        Department::create($input);
        echo"Successfully Create Department";
        return redirect('admin/department/index');
    }

    // public function showDepartment($id)
    // {
    //     $item = Department::findOrFail($id);
    //     return view('admin.department.showDepartment',compact('item'));
    // }

    public function editDepartment($id){
        //find id to update
        $itemDepartment = Department::findOrFail($id);
        return view('admin.department.editDepartment', compact('itemDepartment'));
    }

    public function updateDepartment(Request $request, $id){
        $itemDepartment = Department::findOrFail($id);
        // assign information to data variable
        $data = $request -> all();
        $itemDepartment->update($data);
        return redirect('admin/department/index');
    }

    public function deleteDepartment($id)
    {
        $item = Department::findOrFail($id);
        $item -> delete();
        return redirect('admin/department/index')->with('flash_message', 'Department deleted!');  
    }

    // Crud Mission

}
