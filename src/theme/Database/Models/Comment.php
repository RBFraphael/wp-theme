<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = "comments";

    protected $fillable = [
        "comment_post_ID",
        "comment_author",
        "comment_author_email",
        "comment_author_url",
        "comment_author_IP",
        "comment_date",
        "comment_date_gmt",
        "comment_content",
        "comment_karma",
        "comment_approved",
        "comment_agent",
        "comment_type",
        "comment_parent",
        "user_id",
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, "comment_post_ID");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, "comment_parent");
    }

    public function children()
    {
        return $this->hasMany(Comment::class, "comment_parent");
    }

    public function meta()
    {
        return $this->hasMany(CommentMeta::class, "comment_id");
    }

}
