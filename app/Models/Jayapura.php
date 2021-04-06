<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Jayapura extends Authenticable
{
    use Notifiable;

    protected $primaryKey = "id";

    protected $guard = 'jayapura';

    protected $fillable = [
        'name', 'username', 'email', 'password','email_verfied_at'
    ];

    protected $hidden = ['password'];
}
