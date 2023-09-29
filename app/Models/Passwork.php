<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Passwork
 *
 * @property $id
 * @property $passgroup_id
 * @property $user_id
 * @property $name
 * @property $user_pass
 * @property $email_pass
 * @property $password_pass
 * @property $link
 * @property $note
 * @property $url_img
 * @property $favourite
 * @property $created_at
 * @property $updated_at
 *
 * @property Passgroup $passgroup
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Passwork extends Model
{
    use HasFactory, Searchable;
    
    static $rules = [
		'user_id' => 'required',
		'name' => 'required',
		'user_pass' => 'required',
		'password_pass' => 'required',
		// 'favourite' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['passgroup_id','user_id','name','user_pass','email_pass','password_pass','link','note','url_img','favourite'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function passgroup()
    {
        return $this->hasOne('App\Models\Passgroup', 'id', 'passgroup_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'user_pass' => $this->user_pass,
            'email_pass' => $this->email_pass,
            'password_pass' => $this->password_pass
        ];
    }
    

}
