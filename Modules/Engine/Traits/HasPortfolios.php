<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Portfolio;

trait HasPortfolios
{
    public static function bootHasPortfolios()
    {
         // static::created(function (self $model) {
         //       if($model->shouldGeneratePortfolio()) {
         //
         //          }
         //    });
    }

    protected static function shouldGeneratePortfolio()
    {
      return true;
    }

    public function userPortfolios()
    {
       return $this->hasMany(Portfolio::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
