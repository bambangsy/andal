<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name', // Add other fields if needed
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function dashboards()
    {
        return $this->belongsToMany(Dashboard::class);
    }
}
