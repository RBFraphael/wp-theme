<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $table = "options";

    protected $fillable = [
        "option_name",
        "option_value",
        "autoload"
    ];

}
