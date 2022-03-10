<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        return view('admin.register');
    }

    
    public function list()
    {
        $data = User::all();
        return view('admin.listAccount.index',['users'=>$data]);
    }

    public function indexCategory(){
        $categories = Category::all();
        
        return view('admin.category.indexCategory', compact('categories'));
    }
    
    public function createCategory()
    {
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

    public function createDepartment()
    {
        return view();
    }

}
