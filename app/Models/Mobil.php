<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $guarded = ['id_mobil'];
    protected $primaryKey = 'id_mobil';
    protected $dates = ['created_at'];
}
