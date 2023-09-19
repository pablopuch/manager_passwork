<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passwork extends Model
{
    use HasFactory;

    protected $table = 'passworks';

    protected $fillable = [
        'group_id',
        'user_id',
        'name',
        'user_pass',
        'email_pass',
        'password_pass',
        'link',
        'note',
        'url_img',
        'favourite'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //relations
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }

    
}
