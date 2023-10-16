<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Carbon\Carbon;
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
            $today = $today = Carbon::today(),

            $events = DB::table('events')->where('dateOfEvent', '>=', $today)->orderBy('dateOfEvent')->simplePaginate(3),

            'events' => $events,
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
            'name' => 'required|string|min:5|max:255',
            'theme' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'dateOfEvent' => 'required|date|after_or_equal:today'
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
    public function update(StoreEventRequest $request, Event $event)
    {
        $this->authorize('update', $event);

        $validated = $request->validated();

        $validated = $request->safe()->only(['name', 'theme', 'location', 'description', 'dateOfEvent']);

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
