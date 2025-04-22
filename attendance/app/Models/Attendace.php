<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
user Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendace extends Model
{
    user HasFactory;

    protected $fillable = [
        'user_id',
        'clock_in',
        'clock_out',
        'status',
        'date',
        'total_hours'
    ];

    protected $casts =[
        'clock_in' => 'datetime:H:i',
        'clock_out' => 'datetime:H:i',
        'date' => 'date'
    ];

    //create relationship

    public function user(){
        return $this->belongsTo(User::class)
    }

    //user total hours  calculation 

    public function totalHours(){
        if($this->clock_in && $this->clock_out){
              $clockIn = \Carbon::parse($this->clock_in);
              $clockOut= \Carbon::parse($this->clock_out);
              $this->total_hours = round($checkOut->diffInMinutes($checkIn) / 60 , 2);
              $this->save();
        }
    }


}
