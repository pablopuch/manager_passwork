<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Passgroup
 *
 * @property $id
 * @property $user_id
 * @property $name
 * @property $url_img
 * @property $created_at
 * @property $updated_at
 *
 * @property Passwork[] $passworks
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Passgroup extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','name','url_img'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function passworks()
    {
        return $this->hasMany('App\Models\Passwork', 'passgroup_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
