<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = "posts";

    protected $fillable = [
        "post_author",
        "post_date",
        "post_date_gmt",
        "post_content",
        "post_title",
        "post_excerpt",
        "post_status",
        "comment_status",
        "ping_status",
        "post_password",
        "post_name",
        "to_ping",
        "pinged",
        "post_modified",
        "post_modified_gmt",
        "post_content_filtered",
        "post_parent",
        "guid",
        "menu_order",
        "post_type",
        "post_mime_type",
        "comment_count",
    ];

    protected $casts = [
        "post_date" => "datetime",
        "post_date_gmt" => "datetime",
        "post_modified" => "datetime",
        "post_modified_gmt" => "datetime",
    ];

    public function author()
    {
        return $this->belongsTo(User::class, "post_author");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, "comment_post_ID");
    }

    public function meta()
    {
        return $this->hasMany(PostMeta::class, "post_id");
    }

    public function terms()
    {
        return $this->belongsToMany(Term::class, "term_relationships", "object_id", "term_taxonomy_id");
    }

    public function parent()
    {
        return $this->belongsTo(Post::class, "post_parent");
    }

    public function children()
    {
        return $this->hasMany(Post::class, "post_parent");
    }

}
