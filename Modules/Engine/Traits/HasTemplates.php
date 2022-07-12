<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Template;

trait HasTemplates
{
    public static function bootHasTemplates()
    {
      if (app()->runningInConsole()) {
          return;
      }
         // static::created(function (self $model) {
         //       if($model->shouldGenerateTemplates()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateTemplates()
    {
      return true;
    }

    public function templates()
    {
       return $this->morphMany(Template::class, 'author');
    }

    public function userTemplates()
    {
       return $this->hasMany(Template::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
