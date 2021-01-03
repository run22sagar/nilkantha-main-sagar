<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Psr7\str;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['display','displayPostWithLink','displayPost','displayGallery']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 1;

        if (!empty($keyword)) {
            $posts = Post::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
//            $posts = Post::latest()->paginate($perPage);
            $keyword = 'landing_page';
            $type = 'landingPage';
            $posts = Post::where('category', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        }

        return view('posts.index', compact('posts','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($type)
    {
        return view('posts.create', compact('type'));
    }

//    public function aboutUs()
//    {
//        return view('posts.aboutUs');
//    }
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
        if ($request->hasFile('file_path')) {
            $requestData['file_path'] = 'storage/' . $request->file('file_path')
                ->store('uploads', 'public');
        }
        $post = Post::create($requestData);

        $view = 'posts/';

        if ($post->category !== 'landing_page'){
            if ($post->category === 'about_us') {
                $view = $view . 'aboutUs';
            }
            else {
                $view = $view . $post->category;
            }
        }
        return redirect( $view )->with('flash_message', 'Post added!');
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

        $keyword = '';
        switch ($id){
            case 'landingPage':
                $keyword = 'landing_page';
                $type = 'landingPage';
                break;
            case 'aboutUs':
                $keyword = 'about_us';
                $type = 'aboutUs';
                break;
            case 'news':
                $keyword = 'news';
                $type = 'news';
                break;
            case 'notices':
                $keyword = 'notices';
                $type = 'notices';
                break;
            case 'events':
                $keyword = 'events';
                $type = 'events';
                break;
            case 'galleries':
                $keyword = 'galleries';
                $type = 'galleries';
                break;
            case 'admission':
                $keyword = 'admission';
                $type = 'admission';
                break;
            case 'courses':
                $keyword = 'courses';
                $type = 'courses';
                break;
            case 'community':
                $keyword = 'community';
                $type = 'community';
                break;
            case 'alumni':
                $keyword = 'alumni';
                $type = 'alumni';
                break;
            case 'nccs':
                $keyword = 'nccs';
                $type = 'nccs';
                break;
            default:
                abort(404);
        }
        $posts = $this->getAllLatestPost($keyword);

//        foreach ($posts as $post)
//        {
//            if (!empty($post->image_path))
//            {
//                $imagePath = $post->image_path;
////                $post->image_path = Storage::disk('public')->get($imagePath);
//            }
//            if (!empty($post->file_path))
//            {
//                $filePath = $post->file_path;
//            }
//        }
        return view('posts.index', compact('posts','type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($type,$id)
    {
        $post = $this->getPost($id);

        return view('posts.edit', compact('post','type'));
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
        $oldImagePath = '';
        $oldFilePath = '';

        $requestData = $request->all();
        $post = $this->getPost($id);

        if ($request->hasFile('image_path')) {
            $requestData['image_path'] = 'storage/' . $request->file('image_path')
                ->store('uploads', 'public');
            $oldImagePath = $post->image_path;
            $oldImagePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldImagePath);
        }
        else {
            $requestData['image_path'] = $post->image_path;
        }

        if ($request->hasFile('file_path')) {
            $requestData['file_path'] = 'storage/' . $request->file('file_path')
                ->store('uploads', 'public');
            $oldFilePath = $post->file_path;
            $oldFilePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldFilePath);
        }
        else
        {
            $requestData['file_path'] = $post->file_path;
        }

        $post->update($requestData);

        if(isset($oldImagePath)) {
            if(File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }
        if (isset($oldFilePath)) {
            if(File::exists($oldFilePath)){
                File::delete($oldFilePath);
            }
        }

        $view = 'posts/';

        if ($post->category !== 'landing_page'){
            if ($post->category === 'about_us') {
                $view = $view . 'aboutUs';
            }
            else {
                $view = $view . $post->category;
            }
        }

        return redirect($view)->with('flash_message', 'Post updated!');
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
        $post = $this->getPost($id);
        $oldImagePath = '';
        $oldFilePath = '';

        if ($post){
            $oldImagePath = $post->image_path;
            $oldFilePath = $post->file_path;
        }
        $view = 'posts/';

        if ($post->category !== 'landing_page'){
            if ($post->category === 'about_us') {
                $view = $view . 'aboutUs';
            }
            else {
                $view = $view . $post->category;
            }
        }

        Post::destroy($id);

        if ($oldImagePath){
            $oldImagePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldImagePath);
        }
        if ($oldFilePath){
            $oldFilePath = str_replace("storage/",storage_path('') . '/app/public/' , $oldFilePath);
        }

        if(File::exists($oldImagePath)){
            File::delete($oldImagePath);
        }

        if(File::exists($oldFilePath)){
            File::delete($oldFilePath);
        }

        return redirect($view)->with('flash_message', 'Post deleted!');
    }

    public function display($type) {

        $view = 'empty';
        $view = $type === 'about_us' ? 'aboutUs' : $type;

        $recentPosts = [];

        if ($type === 'galleries'){
            $posts = $this->getAllLatestPost($type);
            foreach ($posts as $post) {
                $images = $post->images;
                if (!$images->isEmpty()) {
                    $post->image_path = $images[0]->path;
                }
            }
        }
        elseif ($type === 'admission' || $type === 'courses' || $type === 'alumni' )
        {
            $posts = $this->getAllLatestPost($type);
        }
        else{
            $recentPosts = $this->getRecentPosts($type);
            if ($type === 'about_us'){
                $posts = $this->getFirstPost($type);
            }
            else {
                $posts = $this->getLatestPost($type);
            }
        }
//        echo json_encode($type);
//        echo json_encode($recentPosts);
//        echo json_encode($posts);
        return view("display.$view", compact('posts', 'recentPosts', 'type'));
    }

    public function displayPostWithLink($type, $id)
    {
        $view = 'empty';
        $view = $type === 'about_us' ? 'aboutUs' : $type;

        $recentPosts = $this->getRecentPosts($type);
        $posts = [$this->getPost($id)];

//        echo json_encode($type);
//        echo json_encode($recentPosts);
//        echo json_encode($posts);

        return view("display.$view", compact('posts', 'recentPosts', 'type'));
    }

    private function getRecentPosts($type){
        if ($type === 'about_us')
        {
            $posts = $this->getFirst10Posts($type);
        }
        else
        {
            $posts = $this->getLatest10Posts($type);
        }
        $recentPosts = [];
        if (sizeof($posts) > 0)
        {
            if ($type === 'about_us' || $type === 'admissions' || $type === 'courses' || $type === 'notices' || $type === 'events'
                || $type === 'news' || $type === 'community' || $type === 'nccs')
            {
                $recentPosts = $posts->map(function ($item, $key) {
                    return ["id" => $item->id, "title" => $item->title];
                });
                $posts = $posts->first();
            }
        }
        return $recentPosts;
    }

    private function getLatest10Posts($type)
    {
        $keyword = $type;
        return Post::where('category', "$keyword")
            ->latest()->take(10)->get();
    }

    private function getFirst10Posts($type)
    {
        $keyword = $type;
        return Post::where('category', "$keyword")
            ->take(10)->get();
    }

    private function getLatestPost($type)
    {
        $keyword = $type;
        return Post::where('category', "$keyword")
            ->latest()->take(1)->get();
    }

    private function getAllLatestPost($type)
    {
        if ($type === 'galleries') {
            $perPage = 9;
        }
        else {
            $perPage = 10;
        }
        $keyword = $type;
        return Post::where('category', "$keyword")
            ->latest()->simplePaginate($perPage);
    }
    private function getFirstPost($type)
    {
        $perPage = 10;
        $keyword = $type;
        return Post::where('category', "$keyword")->take(1)->get();
    }
    private function getAllRecentPost($type)
    {
        $perPage = 10;
        $keyword = $type;
        return Post::where('category', "$keyword")
            ->simplePaginate($perPage);
    }
    private function getPost($id)
    {
        return Post::findOrFail($id);
    }

    public function displayPost($type, $id)
    {
        $post = $this->getPost($id);
        return view('display.post', compact('post','type'));
    }

    public function displayGallery($id)
    {
        $post = Post::findOrFail($id);
        $images = $post->images;
        $galleryName = $post->title;
//        echo json_encode($images);
        $type = 'galleryImages';
        return view('display.galleryImages', compact('images', 'type', 'galleryName'));
    }

    public static function getCategoryType($post_id)
    {
        $post = Post::findOrFail($post_id);
        if ($post->category !== 'landing_page'){
            if ($post->category === 'about_us'){
                return 'aboutUs';
            }
            return $post->category;
        }
        return '';
    }
}
