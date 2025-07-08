<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $fillable = [
        'title', // Add other fields if needed
        'link'
    ];
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
