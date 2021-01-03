<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Alumnus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlumniController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['displayAlumni']]);
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
            $alumni = Alumnus::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('middle_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('batch', 'LIKE', "%$keyword%")
                ->orWhere('current_involvement', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $alumni = Alumnus::latest()->paginate($perPage);
        }

        return view('alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('alumni.create');
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

        $validateData = $request->validate([
            'first_name' => ['bail', 'required', 'max:255', 'regex:/^[a-z|A-Z]*$/'],
            'middle_name' => ['bail', 'nullable', 'max:255', 'regex:/^[a-z|A-Z]*$/'],
            'last_name' => ['bail', 'required', 'max:255', 'regex:/^[a-z|A-Z]*$/'],
            'batch' => ['bail', 'required', 'max:255', 'regex:/^[0-9]*$/'],
            'current_involvement' => ['bail', 'required', 'max:255'],
            'description' => ['bail', 'required'],
            'image_path' => ['bail', 'required'],
        ]);
        if ($request->hasFile('image_path')) {
            $validateData['image_path'] = 'storage/' . $request->file('image_path')
                ->store('uploads', 'public');
        }

        Alumnus::create($validateData);

        return redirect('alumni')->with('flash_message', 'Alumnus added!');
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
        $alumnus = Alumnus::findOrFail($id);

        return view('alumni.show', compact('alumnus'));
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
        $alumnus = Alumnus::findOrFail($id);

        return view('alumni.edit', compact('alumnus'));
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

        $validateData = $request->validate([
            'first_name' => ['bail', 'required', 'max:255', 'regex:/^[a-z|A-Z]*$/'],
            'middle_name' => ['bail', 'nullable', 'max:255', 'regex:/^[a-z|A-Z]*$/'],
            'last_name' => ['bail', 'required', 'max:255', 'regex:/^[a-z|A-Z]*$/'],
            'batch' => ['bail', 'required', 'max:255', 'regex:/^[0-9]*$/'],
            'current_involvement' => ['bail', 'required', 'max:255'],
            'description' => ['bail', 'required'],
            'image_path' => ['bail', 'required'],
        ]);
        $alumnus = Alumnus::findOrFail($id);

        if ($request->hasFile('image_path')) {
            $validateData['image_path'] = 'storage/' . $request->file('image_path')
                ->store('uploads', 'public');
            $oldImagePath = $alumnus->image_path;
            $oldImagePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldImagePath);
        }
        else
        {
            $validateData['image_path'] = $alumnus->image_path;
        }

        $alumnus->update($validateData);

        if (isset($oldImagePath)) {
            if(File::exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }

        return redirect('alumni')->with('flash_message', 'Alumnus updated!');
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
        $alumni = Alumnus::findOrFail($id);
        $oldImagePath = '';

        if ($alumni) {
            $oldImagePath = $alumni->image_path;
        }

        Alumnus::destroy($id);

        if ($oldImagePath){
            $oldImagePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldImagePath);
        }

        if(File::exists($oldImagePath)){
            File::delete($oldImagePath);
        }

        return redirect('alumni')->with('flash_message', 'Alumnus deleted!');
    }

    public function displayAlumni(){
//        echo 'display Alumni';
        $perPage = 9;

        $type = 'Alumni';
        $alumni = Alumnus::paginate($perPage);
//        echo json_encode($alumni[0]);
        return view('display.featured_alumni', compact('alumni', 'type'));
    }
}
