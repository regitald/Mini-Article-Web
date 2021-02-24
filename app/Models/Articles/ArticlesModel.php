<?php

namespace App\Models\Articles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticlesModel extends Model
{
            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    protected $table   = 'articles';
	public $primarykey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'category_id','title','content','banner','slug'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at','updated_at'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Articles\CategoryArticlesModel', 'category_id', 'category_id');
    }
}
