<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = [
        'user_id',
        'name',
        'url_img',
    ];

    //relations
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function passworks(){
        return $this->hasMany(Passwork::class);
    }
}
