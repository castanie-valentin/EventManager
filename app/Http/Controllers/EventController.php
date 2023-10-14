<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:events|max:255',
            'theme' => 'required|max:255',
            'user_id'=> 'required',
            'description' => 'required',
            'location'=> 'required',
            'dateOfEvent' => 'required',
        ]);

        return redirect('events');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('event', [
            'event' => $event,
            'user' => $event->user,
        ]);
    }

    public function showAll () {
        return view('home',[
            'events' => Event::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
