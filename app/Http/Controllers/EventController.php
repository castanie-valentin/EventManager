<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home', [
            $events = DB::table('events')->orderBy('dateOfEvent')->simplePaginate(3),

            'events'=> $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events/event-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'dateOfEvent' => 'required|date'
        ]);

        $request->user()->events()->create($validated);

        return redirect('/');
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $this->authorize('update', $event);

        return view('events/event-edit', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $this->authorize('update',$event);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'dateOfEvent' => 'required|date'
        ]);

        $event->update($validated);

        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);

        $event->delete();

        return redirect(route('home'));
    }
}
