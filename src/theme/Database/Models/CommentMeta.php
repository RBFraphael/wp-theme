<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class CommentMeta extends Model
{
    public $table = "commentmeta";

    protected $fillable = [
        "comment_id",
        "meta_key",
        "meta_value",
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class, "comment_id");
    }

}
