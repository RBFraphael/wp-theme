<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = "users";

    protected $fillable = [
        "user_login",
        "user_pass",
        "user_nicename",
        "user_email",
        "user_url",
        "user_registered",
        "user_activation_key",
        "user_status",
        "display_name",
    ];

    protected $casts = [
        "user_registered" => "datetime",
        "user_pass" => "hash",
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, "post_author");
    }

    public function meta()
    {
        return $this->hasMany(UserMeta::class, "user_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, "user_id");
    }

}
