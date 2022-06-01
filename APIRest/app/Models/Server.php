<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "server";
    protected $fillable = ['ipv4', 'ipv6', 'location', 'description'];
    protected $hidden = ['created_at', 'updated_at'];

    public function logs()
    {
        return $this->hasMany('App\Models\Log');
    }
}
