<?php

namespace App\Models\Articles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryArticlesModel extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    protected $table   = 'category_articles';
	public $primarykey = 'category_id';
    public $timestamps = true;

    protected $fillable = [
        'category_name','slug'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at','updated_at'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['category_name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Articles\ArticlesModel', 'category_id', 'category_id');
    }
}
