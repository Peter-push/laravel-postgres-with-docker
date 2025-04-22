<?php

namespace App\Http\Controllers;

use App\Models\Attendace;
use Illuminate\Http\Request;

class AttendaceController extends Controller
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
    public function create(Request $request)
    {
        // 
        $user = Auth::user();
        $today = now()->format('Y-m-d');


        // check if user logged in today 
        $userExist = Attendance::where('user_id', $user->id)
                    ->where('date' , $today)
                    ->first();

      if($userExist){

        return Response:: json ([
            'Error' => 'User has checke in already',
        ], 201);
                           }
    }

    Attendance::create([
        'user_id' => $user->id,
        'date' => $today,
        'clock_in' => $user->id,
        'status' => 'Clocked In',
    ]);

    return Response:: json ([
        'user_id' => $user_id,
         'date' => $date,
         'clock_in'=> $user_id
    ], 200); 
    
}

    /**
     * Store a newly created resource in storage.
     */
    public function clockOut(Request $request)
    {
                
                $user = Auth::user();
                $today = now()->format('Y-m-d');

                $attendance = Attandance::where('user_id', $user->id)
                ->whereDate('date',$today)
                ->first($attendace);

                if(!$attendance){
                    return Response:: json ([
                        'error' => "You need to check in first",
                    ], 201); 
                }

                if($attendance->clock_out){
                    return Response:: json ([
                        'error' => "You have checked out already",
                    ], 201); 
                }

                $attendance->udpate(
                    'clock_in' => now()->format(H:i:s),
                    'total_hours' => $this->calculateHours($attendace->check_in, now()->format('H:i:s'))
                )

                return Response:: json ([
                    'error' => "You have checked out successfully",
                ], 200); 


    }

    /**
     * Display the specified resource.
     */
    public function show(Attendace $attendace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendace $attendace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendace $attendace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendace $attendace)
    {
        //
    }
}
