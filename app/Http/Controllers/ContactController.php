<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['display','sendMail']]);
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
            $contact = Contact::where('address', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('googleMapUrl', 'LIKE', "%$keyword%")
                ->orWhere('mapImage', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contact = Contact::latest()->paginate($perPage);
        }

        return view('contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('contact.create');
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

        Contact::create($requestData);

        return redirect('contact')->with('flash_message', 'Contact added!');
    }

    public function saveInquiryDetails(Request $request){
        $requestData = $request->all();
        ContactUs::create($requestData);
        return redirect('contact')->with('flash_message', 'Inquiry Detail added!');
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
        $contact = Contact::findOrFail($id);

        return view('contact.show', compact('contact'));
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
        $contact = Contact::findOrFail($id);

        return view('contact.edit', compact('contact'));
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

        $contact = Contact::findOrFail($id);

        $contact->update($requestData);

        return redirect('contact')->with('flash_message', 'ContactUs updated!');
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
        $contact = Contact::findOrFail($id);

        Contact::destroy($id);

        return redirect('contact')->with('flash_message', 'ContactUs deleted!');
    }

    public function display()
    {
        $contact = Contact::first();
        $type = 'contact';
//        echo json_encode($contact);
        return view('display.contactUs', compact('contact', 'type'));
    }

    public function sendMail(Request $request){

//        return json_encode($request->all());
        $name = $request->get('name');
        $email = $request->get('email');
        $messageVal = $request->get('message');

        $data = array('name'=> $name, 'messageVal'=> $messageVal);
        Mail::send('layouts.mail', $data, function ($message) use ($name, $email) {
            $message->to('info@nilkantha.com','Nilkantha Contact')->subject('Inquiry Message');
            $message->from($email, $name);
        });
//        Mail::to('info@test.com')->send('layouts.mail');
        $contacts = Contact::all();
        return redirect('contacts')->with('flash_message', 'Mail Sent.');
    }
}
