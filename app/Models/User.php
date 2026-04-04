<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
 
    class User extends Model
    {
        protected $table = 'users';

        protected $fillable = [
            'username', 'password', 'gender'
        ];

        protected $hidden = [
            'password',
        ];

    // remove this line or set to true
    // public $timestamps = false;
}
