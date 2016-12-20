<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Notifiable;

    protected $table = 'service';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_sale_id', 'service_id'
    ];

    public function userSale()
    {
        return $this->belongsToMany('App\UserSale');
    }


}
