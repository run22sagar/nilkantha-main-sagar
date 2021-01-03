<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['landingPage','routePost']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/posts');
    }

    public function landingPage()
    {
        $landingPagePost = Post::select('id')->with('images:id,title,path,post_id')->firstWhere('category', "landing_page");
        $carouselImages = $landingPagePost->images->map(function ($item, $key) {
            return ["path" => $item->path, "title" => $item->title];
        });
        $notices = Post::select( 'id', 'title' )
            ->where('category', "notices")
            ->latest()
            ->take(5)
            ->get();

        $message = Post::select( 'id', 'title', 'description', 'image_path' )
            ->where('category', "about_us")
            ->where('landing_page', 1)
            ->latest()->take(1)->get();

        $featured = Post::select( 'id', 'title', 'description' )
            ->where('category', "news")
            ->latest()
            ->take(1)
            ->get();

        $events = Post::select( 'id', 'title', 'start_time', 'end_time', 'location', 'date' )
            ->where('category', "events")
            ->latest()
            ->take(6)
            ->get();

//        $carouselImages = Post::where('id',1000000)->get();
//        $notices = Post::where('id',1000000)->get();
//        $message = Post::where('id',1000000)->get();
//        $featured = Post::where('id',1000000)->get();
//        $events = Post::where('id',1000000)->get();

        $posts = collect([
            "carousel" => $carouselImages,
            "notices" => $notices,
            "message" => $message,
            "featured" => $featured,
            "events" => $events,
        ])->all();

//        echo json_encode($posts['events']);
        return view('welcome', compact('posts'));
    }

    public function routePost($type, $id){

        if ($type === 'Faculties' || $type === 'Managements' || $type === 'Others')
        {
            echo 'yo';
            return redirect("/members/$type/$id");
        }
        else{
//            echo 'Po';
            return redirect("/view/$type/$id");
        }
    }
}
