<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGreetingRequest;
use App\Http\Requests\UpdateGreetingRequest;
use App\Models\Greeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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

            return response()->json([
                'url' => route('greetingcard.show', $greeting)
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong: ' . $th
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Greeting $greetingcard)
    {
        $id = $greetingcard->id;
        $type = $request->is_potrait ?? 1;
        $link = route('getImage', [$id, intval($type)]);
        return view('pages.preview', compact(['link', 'id', 'type', 'greetingcard']));
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

    public function getTemplate($id)
    {
        $greetingcard = Greeting::findOrFail($id);
        return view('pages.template', [
            'greeting' => $greetingcard
        ]);
    }


    public function getImage($id, int $index)
    {
        // try {
            $screenshot = Browsershot::url(route('templateImage', $id))
            ->select('#picture', $index)
            ->setScreenshotType('jpeg', 100)
            ->windowSize(1920, 1080)
            ->timeout(60)
            ->screenshot();

            return response($screenshot)->header('Content-Type', 'image/jpeg');
    }

    public function downloadImage(Request $request, Greeting $greeting)
    {
        $type = $request->is_potrait ?? 1;
        $url = route('getImage', [$greeting->id, intval($type)]);
        $imageData = Http::get($url)->body();
        $headers = [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'attachment; filename="kartu-ucapan-'. $greeting->sender_name .'.jpeg"'
        ];
        return response($imageData, 200, $headers);
    }

    public function resetImageDb()
    {
        Storage::deleteDirectory('public/greetingcard');
        dd('reset berhasil');
    }
}
