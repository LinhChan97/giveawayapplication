<?php

namespace App\Models\V1;

use App\Models\V1\MainModel;

class Event extends MainModel
{
    protected $table = 'events';

    protected $searchField = 'name';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cause_id', 'user_id', 'avatar', 'description', 'text', 'goal_item', 'start_date', 
        'end_date', 'location', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot', 'deleted_at', 'cause_id', 'user_id', 
    ];
  
    /**
     * User relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Cause relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cause()
    {
        return $this->belongsTo(Cause::class, 'cause_id');
    }
}
