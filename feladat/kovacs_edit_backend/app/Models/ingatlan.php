<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingatlan extends Model
{
    public $table = 'ingatlanok';
    public $timestamps = false;

    public $guarded = [];

    public function kategoria()
    {
        return $this->belongsTo(kategoria::class, 'kategoria');
    }
}
