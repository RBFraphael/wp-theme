<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    public $table = "term_taxonomy";

    protected $fillable = [
        "term_taxonomy_id",
        "term_id",
        "taxonomy",
        "description",
        "parent",
        "count",
    ];

    public function term()
    {
        return $this->belongsTo(Term::class, "term_id");
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, "term_relationships", "term_taxonomy_id", "object_id");
    }

    public function parent()
    {
        return $this->belongsTo(Taxonomy::class, "parent");
    }

    public function children()
    {
        return $this->hasMany(Taxonomy::class, "parent");
    }

}
