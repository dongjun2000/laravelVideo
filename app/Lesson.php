<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $fillable = ['title', 'intro', 'preview'];
}
