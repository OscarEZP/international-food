<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSale extends Model
{
    use Notifiable;

    protected $table = 'users_sale';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'region_id', 'street', 'street_number', 'service_day', 'service_id','facebook','twitter','instagram','web'
    ];

    /**
     * contain the rules for this model
     * @var array
     */
    public $rules= [
        'street' => 'required',
        'street_number' => 'required',
        'service_day' => 'required',

    ];

    /**
     * contain the possible errors validating incoming data
     * @var
     */
    public $errors;

    /**
     * method for validating incoming data
     * @param $data
     * @return bool false for fail, true otherwise
     */
    public function is_valid($data) {
        $v = Validator::make($data, $this->rules);
        // check for failure
        if ($v->fails()){
            // set errors and return false
            $this->errors = $v->errors();
            return false;
        }

        // validation pass
        return true;
    }
    /**
     * method that return the possibles errors in above method
     * @return mixed
     */
    public function getErrors() {
        return $this->errors;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function service()
    {
        return $this->belongsToMany('App\Service');
    }
}
