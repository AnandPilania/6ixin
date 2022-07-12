<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Net;

trait HasNets
{
    public static function bootHasNets()
    {
         // static::created(function (self $model) {
         //       if($model->shouldGenerateNet()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateNet()
    {
      return true;
    }

    public function userNets()
    {
       return $this->hasMany(Net::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
