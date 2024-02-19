<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    public $table = "examples";

    protected $fillable = [
        "name",
        "email",
        "phone"
    ];

}
