<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Department;
use App\Models\Mission;
use App\Models\Semester;
use App\Http\Requests\MissionRequest;
use App\Http\Requests\UpdateMissionRequest as UpdateMission;



class MissionController extends Controller
{
    public function index()
    {
        return view(
            'admin.missions.index',
            [
                'semester' => Semester::all()
            ]
        );
    }

    public function getDtRowData(Request $request)
    {
        $mission = Mission::all();
        return Datatables::of($mission)
            ->editColumn('end_at', function($data){
                return $data->end_at;
            })
            ->editColumn('department', function ($data) {
                return $data->department->name;
            })
            ->editColumn('semester', function ($data) {
                return $data->semester->name;
            })
            ->editColumn('action', function ($data) {
                return '
                <a class="btn btn-warning btn-sm rounded-pill" href="' . route("admin.mission.update", $data->id) . '"><i class="fa-solid fa-pen-to-square"></i></a>
                <form method="POST" action="' . route('admin.mission.delete', $data->id) . '" accept-charset="UTF-8" style="display:inline-block">
                ' . method_field('DELETE') .
                    '' . csrf_field() .
                    '<button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm(\'Do you want to delete this mission ?\')"><i class="fa-solid fa-trash"></i></button>
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

    public function create(MissionRequest $request)
    {
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
            'department_id' => auth()->user()->department_id,
            'semester_id' => $semester_id,
        ]);
        //send mail
        return redirect()->back()->with('success', 'Create Mission Successfully!');
    }

    public function edit($id,){
        $mission = Mission::findOrFail($id);
        $department = Department::all();
        $semester = Semester::all();
        return view('admin.missions.editMission', compact('mission','category','department','semester'));
    }

    public function update(UpdateMission $request, $id){
        $mission = Mission::find($id);
        $name = $request-> name;
        $description = $request->description;
        $end_at = $request->end_at;
        $category = $request->category;
        $department = $request->department;
        $semester = $request->semester;
        $mission -> update([
            'name' => $name,
            'description' => $description,
            'end_at' => $end_at,
            'category' => $category,
            'department' => $department,
            'semester' => $semester,
        ]);
        $mission->save();
        return redirect('admin/missions') -> with('success', 'Mission successfully updated');    
    }

    public function delete($id)
    {
        $data = Mission::find($id);
        $data->delete();
        return redirect()->back()->with('flash_message', 'User deleted!');
    }

    public function listMissionByDepartment($id)
    {
        $dpm = Department::find($id);
        if (!$dpm) abort(404); //check department exits
        return view(
            'admin.missions.indexbyDepartment',
            [
                'department' => $dpm
            ]
        );
    }

    public function listMissionBySemester($id)
    {
        $smt = Semester::find($id);
        if (!$smt) abort(404); //check semester exits
        return view(
            'admin.missions.indexbySemester',
            [
                'semester' => $smt
            ]
        );
    }


    public function getDtRowDataByCategory($id, Request $request)
    {
        $mission = Mission::where('category_id', $id)->get();
        return Datatables::of($mission)
            ->editColumn('end_at', function ($data) {
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
                <a class="btn btn-warning btn-sm rounded-pill" href="' . route("admin.mission.update", $data->id) . '"><i class="fa-solid fa-pen-to-square"></i></a>
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
    public function getDtRowDataByDepartment($id, Request $request)
    {
        $mission = Mission::where('department_id', $id)->get();
        return Datatables::of($mission)
            ->editColumn('end_at', function ($data) {
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
                <a class="btn btn-warning btn-sm rounded-pill" href="' . route("admin.mission.update", $data->id) . '"><i class="fa-solid fa-pen-to-square"></i></a>
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
    public function getDtRowDataBySemester($id, Request $request)
    {
        $mission = Mission::where('semester_id', $id)->get();
        return Datatables::of($mission)
            ->editColumn('end_at', function ($data) {
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
                <a class="btn btn-warning btn-sm rounded-pill" href="' . route("admin.account.update", $data->id) . '"><i class="fa-solid fa-pen-to-square"></i></a>
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
}
