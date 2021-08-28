<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTheme extends Model
{
    protected $guarded = [];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function problems()
    {
        return $this->hasMany(Problem::class);
    }

    public function theories()
    {
        return $this->hasMany(Problem::class);
    }
}
