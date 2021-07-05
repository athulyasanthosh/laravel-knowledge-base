<?php
namespace Athulya\LaravelKnowledgeBase\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Category extends Model
{
    public $guarded = [];

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
