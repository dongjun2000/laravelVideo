<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $fillable = ['title', 'intro', 'preview', 'ishot', 'iscommend', 'click'];

    /**
     * 与视频表一对多关联
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
