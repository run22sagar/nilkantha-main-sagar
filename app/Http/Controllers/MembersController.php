<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Department;
use App\Models\Member;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function PHPUnit\Framework\isNull;

class MembersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['display','displayMember']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $members = Member::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('middle_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('designation', 'LIKE', "%$keyword%")
                ->orWhere('education', 'LIKE', "%$keyword%")
                ->orWhere('department', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $members = Member::latest()->paginate($perPage);
        }
        return view('members.index', compact('members',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $departments = Department::pluck('name','id');

        return view('members.create',compact('departments'));
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
        if ($request->hasFile('image_path')) {
            $requestData['image_path'] = 'storage/' . $request->file('image_path')
                ->store('uploads', 'public');
        }

        Member::create($requestData);

        return redirect('members')->with('flash_message', 'Member added!');
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
        $member = Member::findOrFail($id);

        return view('members.show', compact('member'));
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
        $member = Member::findOrFail($id);
        $departments = Department::pluck('name','id');
        $selectedID = $member->department_id;
        return view('members.edit', compact('member','departments', 'selectedID'));
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
        $member = Member::findOrFail($id);


        if ($request->hasFile('image_path')) {
            $requestData['image_path'] = 'storage/' . $request->file('image_path')
                ->store('uploads', 'public');
            $oldImagePath = $member->image_path;
            $oldImagePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldImagePath);
        }



        $member->update($requestData);

        if (isset($oldImagePath)) {
            if(File::exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }

        return redirect('members')->with('flash_message', 'Member updated!');
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
        $faculty = Member::findOrFail($id);
        $oldImagePath = '';

        if ($faculty) {
            $oldImagePath = $faculty->image_path;
        }

        Member::destroy($id);

        if ($oldImagePath){
            $oldImagePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldImagePath);
        }

        if(File::exists($oldImagePath)){
            File::delete($oldImagePath);
        }

        return redirect('members')->with('flash_message', 'Member deleted!');
    }

    public function display($type) {
        $perPage = 25;

        switch ($type){
            case 'faculties':
                $keyword = 'faculty';
                $type = 'Faculties';
                $departments = Department::select('id','name')->get();
                $department = '';
                $members = [];
                if ( isset($departments[0]->members))
                {
                    $members = $departments[0]->members;
                    $department = $departments[0]->name;
                }
                return view('display.members', compact('members', 'department',  'departments', 'type'));
            case 'managements':
                $keyword = 'management';
                $type = 'Managements';
                break;
            case 'others':
                $keyword = 'other';
                $type = 'Others';
                break;
            default:
                $keyword = '';
                abort(404);
        }
        $members = Member::where('type', "$keyword")
            ->latest()->paginate($perPage);

        return view('display.members', compact('members','type'));
    }

    public function displayMember($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }
}
