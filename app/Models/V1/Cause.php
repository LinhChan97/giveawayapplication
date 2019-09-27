<?php

namespace App\Models\V1;

use App\Models\V1\MainModel;

class Cause extends MainModel
{
    protected $table = 'causes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'description'
    ];
}
