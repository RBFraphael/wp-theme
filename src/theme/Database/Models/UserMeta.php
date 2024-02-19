<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    public $table = "usermeta";

    protected $fillable = [
        "user_id",
        "meta_key",
        "meta_value",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

}
