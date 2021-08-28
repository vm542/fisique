<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $guarded = [];

    public function theme()
    {
        return $this->belongsTo(SubTheme::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->distinct();
    }
}
