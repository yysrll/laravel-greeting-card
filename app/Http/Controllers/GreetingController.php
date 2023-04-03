<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGreetingRequest;
use App\Http\Requests\UpdateGreetingRequest;
use App\Models\Greeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
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
        $id = $greetingcard->id;
        $link = route('getImage', $id);
        return view('pages.preview', compact(['link', 'id']));
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

    public function getTemplate(int $id)
    {
        $greetingcard = Greeting::findOrFail($id);
        return view('pages.template', [
            'greeting' => $greetingcard
        ]);
    }


    public function getImage(int $id)
    {
        // try {
            $screenshot = Browsershot::url(route('templateImage', $id))
            ->select('#picture')
            ->setScreenshotType('jpeg', 100)
            ->windowSize(1920, 1080)
            ->timeout(60)
            ->screenshot();

            return response($screenshot)->header('Content-Type', 'image/jpeg');
    }

    public function downloadImage(Greeting $greeting)
    {
        $url = route('getImage', $greeting->id);
        $imageData = Http::get($url)->body();
        $headers = [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'attachment; filename="kartu-ucapan-'. $greeting->sender_name .'.jpeg"'
        ];
        return response($imageData, 200, $headers);
    }
}
