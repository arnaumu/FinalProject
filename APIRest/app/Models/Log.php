<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "log";
    protected $fillable = ['timestamp', 'description'];
    protected $hidden = ['created_at', 'updated_at'];
}
