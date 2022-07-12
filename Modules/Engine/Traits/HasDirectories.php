<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Directory;

trait HasDirectories
{
    public static function bootHasDirectories()
    {
         // static::created(function (self $model) {
         //       if($model->shouldGenerateDirectory()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateDirectory()
    {
      return true;
    }

    public function userDirectories()
    {
       return $this->hasMany(Directory::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
