<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Department;
use App\Models\Mission;
use App\Models\Semester;
use App\Models\Category;


class MissionController extends Controller
{
    public function indexMission()
    {
        $categories = Category::all();
        $departments = Department::all();
        $semesters = Semester::all();
        return view(
            'admin.missions.indexMission',
            [
                'categories' => $categories,
                'departments' => $departments,
                'semesters' => $semesters,
            ]
        );
    }

    public function getDtRowData(Request $request)
    {
        $mission = Mission::all();

        return Datatables::of($mission)
            ->editColumn('name', function($data){
                return $data->name;
            })
            ->editColumn('description', function ($data) {
                return $data->description;
            })
            ->editColumn('end_at', function($data){
                return $data->end_at;
            })
            ->editColumn('category', function ($data) {
                return $data->category->name;
            })
            ->editColumn('department', function ($data) {
                return $data->department->name; 
            })
            ->editColumn('semester', function ($data) {
                return $data->semester->name;
            })
            ->editColumn('action', function ($data) {
                return '
                <a class="btn btn-warning btn-sm rounded-pill" href="'.route("admin.account.update",$data->id).'"><i class="fa-solid fa-pen-to-square"></i></a>
                <form method="POST" action="' . route('admin.account.delete', $data->id) . '" accept-charset="UTF-8" style="display:inline-block">
                ' . method_field('DELETE') .
                    '' . csrf_field() .
                    '<button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm(\'Do you want to delete this account ?\')"><i class="fa-solid fa-trash"></i></button>
            </form>
                ';
            })
            ->rawColumns(['action'])
            ->setRowAttr([
                'data-row' => function ($data) {
                    return $data->id;
                }
            ])
            ->make(true);
    }

    public function create(Request $request){
        //todo: Add create user request
        $name = $request->name;
        $description = $request->description;
        $end_at = $request->end_at;
        $category_id = $request->category;
        $department_id = $request->department;
        $semester_id = $request->semester;
        Mission::create([
            'name' => $name,
            'description' => $description,
            'end_at' => $end_at,
            'category_id' => $category_id,
            'department_id' => $department_id,
            'semester_id' => $semester_id,
        ]);
        //send mail
        return redirect()->back()->with('flash_message', 'Missions created!');
    }
}
