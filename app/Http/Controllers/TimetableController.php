<?php

namespace App\Http\Controllers;

use App\Timetable;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return Timetable::all();
    }
    public function webindex()
    {
        //
        $timetable = Timetable::all();
        return view('timetable.list', compact('timetable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $timetable = new Timetable();
        $timetable->department_id = $request->get('department_id');
        $timetable->year_id = $request->get('year_id');
        $filetype = $request->document_name->getClientOriginalExtension();
        $filename = Carbon::now(). '-'.$request->get('document_name')->getClientOriginalExtension();

        $destinationPath = public_path('/upload/timetable');
        $timetable->move($destinationPath, $filename);
        $timetable->document_name = $filename;
            $timetable->save();
        return redirect()->route('timetables.index')->response('Timetable saved successfull', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Timetable::findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $timetable = Timetable::findorfail($id);
        $timetable->department_id = $request->get('department_id');
        $timetable->year_id = $request->get('year_id');
        $timetable->document_name = $request->get('document_name');
        $timetable->save();
        return redirect()->route('timetables.index')->response('Timetable saved successfull', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $timetable = Timetable::findorfail($id);
       $timetable->delete();

       return redirect()->route('timetable.index')->throwResponse('Timetable entry deleted successfully', 200);

    }
}
