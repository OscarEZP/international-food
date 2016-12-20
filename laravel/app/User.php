<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lastname', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * contain the rules for this model
     * @var array
     */
    public $rules= [
        'name' => 'required',
        'lastname' => 'required',
        'phone_number' => 'required',
        'email' => 'required|email',
        'password' => 'required',
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

    /**
     * Get the sale_user associated with the user.
     */
    public function userSale()
    {
        return $this->hasOne('App\UserSale');
    }
}
