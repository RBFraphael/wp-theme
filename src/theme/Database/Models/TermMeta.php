<?php
namespace WpTheme\Database\Models;

use Illuminate\Database\Eloquent\Model;

class TermMeta extends Model
{
    public $table = "termmeta";

    protected $fillable = [
        "term_id",
        "meta_key",
        "meta_value",
    ];

    public function term()
    {
        return $this->belongsTo(Term::class, "term_id");
    }

}
