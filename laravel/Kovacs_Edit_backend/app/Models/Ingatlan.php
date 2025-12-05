<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingatlan extends Model
{
    public $table = 'ingatlanok';
    public $timestamps = false;
    public $guarded = [];

    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class, 'kategoria');
    }
}
