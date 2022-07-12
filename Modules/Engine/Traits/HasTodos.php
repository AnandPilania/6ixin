<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Todo;

trait HasTodos
{
    public static function bootHasTodos()
    {
      if (app()->runningInConsole()) {
          return;
      }
         // static::created(function (self $model) {
         //       if($model->shouldGenerateTodos()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateTodos()
    {
      return true;
    }

    public function todos()
    {
       return $this->morphMany(Todo::class, 'author');
    }

    public function userTodos()
    {
       return $this->hasMany(Todo::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
