<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'description', 'meta_description',
        'meta_keywords', 'status', 'featured_image', 'category_id'
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

    /**
     * Returns the category relationship instance
     * 
     * @return App\Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
