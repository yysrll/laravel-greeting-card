<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGreetingRequest;
use App\Http\Requests\UpdateGreetingRequest;
use App\Models\Greeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Jorenvh\Share\Share;
use Jorenvh\Share\ShareFacade;
use Spatie\Browsershot\Browsershot;

class GreetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.form.form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGreetingRequest $request)
    {
        try {
            $req = $request->validated();
            $timeInUnix = time();
            $greeting = Greeting::create([
                'sender_name' => $req['sender_name'],
                'recipient_name' => $req['recipient_name'],
                'message' => $req['message'],
                'photo_url' => $req['photoUrl']->store('public/greetingcard'),
                'created_time' => $timeInUnix,
            ]);
            return redirect()->route('greetingcard.show', $greeting)->with('success', 'Greeting'. $greeting->sender_name.' card created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Greeting $greetingcard)
    {
        // dd($greeting->sender_name);
        // $shareImage = Share::page('');
        return view('pages.preview', [
            'greeting' => $greetingcard
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Greeting $greeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGreetingRequest $request, Greeting $greeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Greeting $greeting)
    {
        //
    }


    public function getImage(Request $request)
    {
        // try {
            $url = $request->url;

            $filename = uniqid('image_') . '.png';

            // Define the storage path for the image
            $storagePath = 'public/greeting/' . $filename;

            $screenshot = Browsershot::url('http://127.0.0.1:8000/greetingcard/6')
            ->select('#picture')
            // ->fullPage()
            ->timeout(60)
            ->screenshot();
            // ->save(storage_path($storagePath));

            return response($screenshot)->header('Content-Type', 'image/jpeg');
            // ShareFacade::shareImage('', '');

            // return response()->file($screenshot);
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Something went wrong: ' . $th);
        // }

        // Share the image file using the default device
        // $imagePath = Storage::url($storagePath);
        // $imageUrl = url($imagePath);
        // Artisan::call('share', [
        //     'url' => $imageUrl
        // ]);

        // // Return a response with the image URL
        // return response()->json([
        //     'url' => $imageUrl
        // ]);
    }
}
