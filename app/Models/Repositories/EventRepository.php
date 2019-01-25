<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 1/12/2019
 * Time: 7:05 PM
 */

namespace App\Models\Repositories;


use App\Event;

class EventRepository
{
    public function save($input)
    {
        return Event::create([
           'title' => $input['title'],
            'description' => $input['description'],
            'image' => $this->saveImage($input)
        ]);
    }

    public function saveImage($input)
    {
        $image = $input['image'];
        $name = str_slug($input['title']).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/events');
        $imagePath = $destinationPath. "/".  $name;
        $image->move($destinationPath, $name);
    }
}