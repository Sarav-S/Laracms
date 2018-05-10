<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'status', 'deleted_at'
    ];

    /**
     * Returns the status label based on value
     * 
     * @return string
     */
    public function getStatusLabelAttribute() : string
    {
        return $this->status ? "Enabled" : "Disabled";
    }

    /**
     * Returns whether the resource is deleted or not
     * 
     * @return bool
     */
    public function getIsDeletedAttribute() : string
    {
        return $this->deleted_at ? "Yes" : "-";
    }
}
