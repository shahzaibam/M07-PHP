<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {

        $events = Event::all();

        if($events->count() > 0) {
            return response()->json([
                'status' => 200,
                'events' => $events
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'events' => 'No records found'
            ], 404);
        }

    }


    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }else {
            $newEvent = Event::create([
                'name' => $request->name,
                'description' => $request->description,
                'date' => $request->date,
                'time' => $request->time,
            ]);

            if($newEvent) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Event Created Successfully!'
                ], 200);
            }else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong!'
                ], 500);
            }

        }



    }

}
