<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $fillable = ['nama', 'singkatan', 'dekan', 'wakil_dekan'];
}
