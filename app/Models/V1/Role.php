<?php

namespace App\Models\V1;

use App\Models\V1\MainModel;

class Role extends MainModel
{
    protected $table = 'roles';

    const ADMIN_ROLE = 1;
    const DONOR_ROLE = 2;
    const CHARITY_ROLE = 3;
    const LIST_ROLE = [self::ADMIN_ROLE, self::DONOR_ROLE, self::CHARITY_ROLE];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
  
    /**
     * User relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
