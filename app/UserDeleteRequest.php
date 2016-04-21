<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDeleteRequest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_delete_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'comment'
    ];
}
