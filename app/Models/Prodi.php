<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = ['nama', 'singkatan', 'kaprodi', 'sekretaris', 'fakultas_id'];
}
