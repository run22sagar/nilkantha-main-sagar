<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['displayFaculties']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $departments = Department::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $departments = Department::latest()->paginate($perPage);
        }

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Department::create($requestData);

        return redirect('departments')->with('flash_message', 'Department added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);

        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $department = Department::findOrFail($id);
        $department->update($requestData);

        return redirect('departments')->with('flash_message', 'Department updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Department::destroy($id);

        return redirect('departments')->with('flash_message', 'Department deleted!');
    }

    public function displayFaculties($name) {
        $department = Department::select('id','name')
            ->firstWhere('name',"$name");
//        echo json_encode($department);
//        $department = Department::findOrFail($department->id);
        $members = [];
        if ( isset($department))
        {
            $members = $department->members;
//            echo json_encode($department);
        }
//        echo json_encode($members);
        $departments = Department::select('id','name')->get();
        $department = $department->name;
        $type = 'Faculties';
//
        return view('display.members', compact('members','department', 'departments', 'type'));
    }
}
