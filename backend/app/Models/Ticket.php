<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use Notifiable;
    //
    protected $fillable = [
        'title',
        'description',
        'status'
    ];
}
