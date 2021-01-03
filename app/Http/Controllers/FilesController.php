<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\File;
use App\Models\Post;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            $files = File::where('path', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $files = File::latest()->paginate($perPage);
        }

        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($post_id)
    {
//        if (isset($post_id)){
            $posts = Post::where('id', $post_id)->pluck('title','id');
//        }
//        else
//        {
//            $posts = Post::where('category', "notices")->pluck('title','id');
//        }
        return view('files.create', compact('posts','post_id'));
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
        $filePaths = [];
        if ($request->hasFile('path')) {
            for ( $index = 0; $index < sizeof( $requestData['path']); $index++) {
                $filePath = 'storage/' . $request->file('path')[$index]
                        ->store('uploads', 'public');
                array_push($filePaths, $filePath);
            }
        }
        foreach ($filePaths as $filePath){
            $requestData['path'] = $filePath;
            File::create($requestData);
        }

        return redirect('files/' . $request->get('post_id'))->with('flash_message', 'File added!');
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
        $post = Post::findOrFail($id);
        $post_id = $id;
        $perPage = 25;

        $files = $post->files()->paginate($perPage);

        return view('files.index', compact('files', 'post_id'));
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
        $file = File::findOrFail($id);
        $posts = Post::where('category', "notices")->pluck('title','id');
        $selectedID = $file->post_id;
        return view('files.edit', compact('file','posts','selectedID'));

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
        $filePaths = [];

        if ($request->hasFile('path')) {
            for ( $index = 0; $index < sizeof( $requestData['path']); $index++) {
                $filePath = 'storage/' . $request->file('path')[$index]
                        ->store('uploads', 'public');
                array_push($filePaths, $filePath);
            }
        }

        $file = File::findOrFail($id);

        if (sizeof($filePaths) === 0) {
            $requestData['path'] = $file->path;
            $file->update($requestData);
        }
        else {
            $oldFilePath = $file->path;
            $oldFilePath = str_replace("storage/", storage_path('') . '/app/public/', $oldFilePath);

            foreach ($filePaths as $filePath) {

                $requestData['path'] = $filePath;
                $file->update($requestData);
            }

            if (\Illuminate\Support\Facades\File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }
        return redirect('files/' . $request->get('post_id'))->with('flash_message', 'File updated!');
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

        $file = File::findOrFail($id);
        $oldFilePath = '';

        if ($file) {
            $oldFilePath = $file->path;
        }

        File::destroy($id);

        if ($oldFilePath){
            $oldFilePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldFilePath);
        }

        if(\Illuminate\Support\Facades\File::exists($oldFilePath)){
            \Illuminate\Support\Facades\File::delete($oldFilePath);
        }

        return redirect('files')->with('flash_message', 'File deleted!');
    }
}
