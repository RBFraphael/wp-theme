<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public $table = "terms";

    protected $fillable = [
        "term_id",
        "name",
        "slug",
        "term_group",
    ];

    public function taxonomy()
    {
        return $this->belongsTo(Taxonomy::class, "term_id");
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, "term_relationships", "term_taxonomy_id", "object_id");
    }

    public function meta()
    {
        return $this->hasMany(TermMeta::class, "term_id");
    }

}
