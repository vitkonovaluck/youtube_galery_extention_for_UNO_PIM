<?php

namespace Extra\YouTube\Models;

use Illuminate\Database\Eloquent\Model;

class YouTube extends Model
{
    protected $table = 'youtube';

    protected $fillable = ['name', 'url'];
}
