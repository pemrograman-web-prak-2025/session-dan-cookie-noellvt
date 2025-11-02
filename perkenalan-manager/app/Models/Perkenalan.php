<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perkenalan extends Model
{
    protected $table = 'perkenalan';

    protected $fillable = [
        'nama',
        'npm',
        'deskripsi_singkat',
        'user_id'
    ];

    public function user()  
    {
        return $this->belongsTo(User::class);
    }
}