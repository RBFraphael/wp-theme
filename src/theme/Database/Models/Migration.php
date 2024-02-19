<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Migration extends Model
{
    public $table = "migrations";

    protected $fillable = [
        "version",
        "migration_name",
        "start_time",
        "end_time",
        "breakpoint",
    ];

}
