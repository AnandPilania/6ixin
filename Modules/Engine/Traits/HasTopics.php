<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Topic;

trait HasTopics
{
    public static function bootHasTopics()
    {
         // static::created(function (self $model) {
         //       if($model->shouldGenerateTopic()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateTopic()
    {
      return true;
    }

    public function userTopics()
    {
       return $this->hasMany(Topic::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
