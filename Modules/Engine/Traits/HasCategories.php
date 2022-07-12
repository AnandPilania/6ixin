<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Category;

trait HasCategories
{
    public static function bootHasCategories()
    {
         // static::created(function (self $model) {
         //       if($model->shouldGenerateCategory()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateCategory()
    {
      return true;
    }

    public function userCategories()
    {
       return $this->hasMany(Category::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
