<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function DeepCopy\deep_copy;

class ImagesController extends Controller
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
            $images = Image::where('path', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $images = Image::latest()->paginate($perPage);
        }


        return view('images.index', compact('images'));
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
//            $posts = Post::whereIn('category', ['news', 'community', 'nccs', 'events'])->pluck('title', 'id');
//        }
        return view('images.create', compact('posts','post_id'));
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
        $imagePaths = [];
        if ($request->hasFile('path')) {
            for ( $index = 0; $index < sizeof( $requestData['path']); $index++) {
                $imagePath = 'storage/' . $request->file('path')[$index]
                                ->store('uploads', 'public');
                array_push($imagePaths, $imagePath);
            }
        }
        foreach ($imagePaths as $imagePath){

            $requestData['path'] = $imagePath;
            Image::create($requestData);
        }

        return redirect('images/' . $request->get('post_id'))->with('flash_message', 'Image added!');
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

        $images = $post->images()->paginate($perPage);

        return view('images.index', compact('images','post_id'));
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
        $image = Image::findOrFail($id);
        $post = $image->post;
        if ( $post->category === 'landing_page' ) {
//            echo 'here';
            $posts = [$post->id => $post->title];
        }
        else {
            $posts = Post::whereIn('category', ['news', 'community', 'nccs', 'events', 'galleries'])->pluck('title','id');
        }
//        echo json_encode($posts);
//        echo json_encode($post->pluck('title','id'));
        $selectedID = $image->post_id;
        return view('images.edit', compact('image','posts','selectedID'));
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
        $imagePaths = [];

        if ($request->hasFile('path')) {
            for ( $index = 0; $index < sizeof( $requestData['path']); $index++) {
                $imagePath = 'storage/' . $request->file('path')[$index]
                        ->store('uploads', 'public');
                array_push($imagePaths, $imagePath);
            }
        }
        $image = Image::findOrFail($id);

        if (sizeof($imagePaths) === 0) {
            $requestData['path'] = $image->path;
            $image->update($requestData);
        }
        else {
            $oldImagePath = $image->path;
            $oldImagePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldImagePath);

            foreach ($imagePaths as $imagePath){

                $requestData['path'] = $imagePath;
                $image->update($requestData);
            }

            if(File::exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }



        return redirect('images/' . $request->get('post_id'))->with('flash_message', 'Image updated!');
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

        $image = Image::findOrFail($id);
        $oldImagePath = '';

        if ($image) {
            $oldImagePath = $image->path;
        }
        $post = $image->post;
        Image::destroy($id);

        if ($oldImagePath){
            $oldImagePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldImagePath);
        }

        if(File::exists($oldImagePath)){
            File::delete($oldImagePath);
        }

        return redirect('images/' . $post->id)->with('flash_message', 'Image deleted!');
    }
}
