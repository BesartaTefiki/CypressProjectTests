<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'tel_number',
        'email',
        'stylist_id',
        'service_id',
        'date',
       
    
    ];

    protected $dates = [
        'date'
    ];

    protected $casts = [
        'date' => 'datetime',
      ];

      public function service()
{
    return $this->belongsTo(Service::class, 'service_id');
}


      
    public function stylist()
    {
        return $this->belongsTo(Stylists::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'stylist_id');
    }
    

}
