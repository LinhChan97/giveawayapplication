<?php

namespace App\Models\V1;

use App\Models\V1\MainModel;

class Item extends MainModel
{
    protected $table = 'items';

    protected $searchField = 'name';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'avatar', 'description', 'text', 'price'
    ];
  
    /**
     * User relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
