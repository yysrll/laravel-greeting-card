<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGreetingRequest;
use App\Http\Requests\UpdateGreetingRequest;
use App\Models\Greeting;

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
            return redirect()->back()->with('success', 'Greeting card created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Greeting $greeting)
    {
        //
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
}
