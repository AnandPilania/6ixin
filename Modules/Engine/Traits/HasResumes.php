<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Resume;

trait HasResumes
{
    public static function bootHasResumes()
    {
      if (app()->runningInConsole()) {
          return;
      }
         // static::created(function (self $model) {
         //       if($model->shouldGenerateResumes()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateResumes()
    {
      return true;
    }

    public function resumes()
    {
       return $this->morphMany(Resume::class, 'author');
    }

    public function userResumes()
    {
       return $this->hasMany(Resume::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
