<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
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

        return response()->json($event, 201);

    }
}
