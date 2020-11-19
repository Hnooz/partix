<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Part extends Model
{
    use Notifiable;
    protected $guarded = [];
}
