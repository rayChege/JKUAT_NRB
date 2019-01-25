<?php

namespace App\Http\Controllers;

use App\Event;
use App\Helpers\StoreImageTrait;

use App\Models\Repositories\EventRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Event as Events;
use Auth;

class EventController extends Controller
{
    public $eventRepository;

    public function __construct()
    {
        $this->eventRepository = new EventRepository();
    }

    public function index()
    {
//        dd(auth()->user()->id);
        $events = Event::where('user_id', '=', auth::id())->get();
        // $user = Auth::user()->id;

        return new JsonResponse($events);

    }

    public function sendResponse($result, $ujumbe)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $ujumbe,
        ];
        return $response()->json($response, 200);
    }

    public function addEvents()
    {
        return view('events.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $event = new Event();
        $event->title = $request->get('title');
        $event->description = $request->get('description');
        $event->user_id = auth::id();
        //$event->image = $request->get('image');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($request->title) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/events');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $event->image = $name;
        }

        $event->save();
        return redirect()->route('events.list')
            ->with('success', "Event added Successfully");
    }

    public function edit($id)
    {
        $event = Event::find($id);

        return view('events.edit', compact('event'));
    }

    public function updated(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $event = Event::find($id);

        $event->title = $request->get('title');
        $event->description = $request->get('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($request->title) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/events');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $event->image = $name;
        }


        $event->save();

        return redirect()->route('events.list')->with('success', "This post was successfully updated.");
    }

    public function destroy(Event $event)
    {
        // $event = Event::find($id);

//        $event->delete();
//
//        return redirect()->route('events.list')->with('success', "The post was successfully deleted.");
//    }
    }

}
