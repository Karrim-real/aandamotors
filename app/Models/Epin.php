<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epin extends Model
{
    use HasFactory;
    protected $fillable = [
        'generated_pin',
        'generated_status',
        'redem_pin'
    ];
}
