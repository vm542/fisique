<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $guarded = [];

    public function subthemes()
    {
        return $this->hasMany(SubTheme::class);
    }
}
