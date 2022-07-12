<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Thread;

trait HasThreads
{
    public static function bootHasThreads()
    {
      if (app()->runningInConsole()) {
          return;
      }
         // static::created(function (self $model) {
         //       if($model->shouldGenerateThreads()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateThreads()
    {
      return true;
    }

    public function threads()
    {
       return $this->morphMany(Thread::class, 'author');
    }

    public function userThreads()
    {
       return $this->hasMany(Thread::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
