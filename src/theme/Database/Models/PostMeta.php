<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    public $table = "postmeta";

    protected $fillable = [
        "post_id",
        "meta_key",
        "meta_value",
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, "post_id");
    }

}
