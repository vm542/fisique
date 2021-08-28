<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theory extends Model
{
    public function theme()
    {
        return $this->belongsTo(SubTheme::class);
    }
}
