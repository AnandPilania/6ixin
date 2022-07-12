<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Application;

trait HasApplications
{
    public static function bootHasApplications()
    {
      if (app()->runningInConsole()) {
          return;
      }
         // static::created(function (self $model) {
         //       if($model->shouldGenerateApplications()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateApplications()
    {
      return true;
    }

    public function application()
    {
       return $this->morphMany(Application::class, 'author');
    }

    public function userApplications()
    {
       return $this->hasMany(Application::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
