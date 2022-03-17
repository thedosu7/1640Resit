<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;
use App\Models\Account;
use DB;


class AdminController extends Controller
{
    public function index()
    {
        $department = DB::table('departments')->count();
        $category = DB::table('categories')->count();
        $account = DB::table('users')->count();
        return view('admin.dashboard', compact('department','category','account'));
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
    
    public function createCategory(){
        return view('admin.category.createCategory');
    }
    public function storeCategory(Request $request){
        // dd($request);
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);
        $cate = new Category;
        $cate->name = $request->input('name');
        $cate->description = $request->input('description');

        $cate->save();
        return redirect('/admin/category/index')->with('success','Successfull create category');

        
    }

    public function editCategory($id){
        //find id to update
        $dataCategory = Category::findOrFail($id);
        return view('admin.category.index', compact('dataCategory'));
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
        $this->validate($request,[
            'name' => 'required',
        ]);
        $dpm = new Department;
        $dpm->name = $request->input('name');
        $dpm->save();
        return redirect('/admin/department/index')->with('success','Successfull create department');
    }
    public function editDepartment($id){
        $dpm = Category::findOrFail($id);
        return view('admin.category.index', compact('dpm'));
    }

    public function updateDepartment(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
        ]);
        $dpm = Department::findOrFail($id);
        $dpm->name = $request->input('name');
        $dpm->save();
        return redirect('/admin/department/index')->with('success','Data Update');
    }

    public function deleteDepartment($id)
    {
        $item = Department::findOrFail($id);
        $item -> delete();
        return redirect('admin/department/index')->with('flash_message', 'Department deleted!');  
    }

    // Crud Mission

    

}
