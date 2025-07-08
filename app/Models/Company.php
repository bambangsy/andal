<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', // Tambahkan field lain jika diperlukan
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
