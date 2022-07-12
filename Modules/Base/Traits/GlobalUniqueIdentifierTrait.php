<?php

namespace Modules\Base\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait GlobalUniqueIdentifierTrait
{
    public static function bootGlobalUniqueIdentifierTrait()
    {
      if(app()->runningInConsole()) {
          return;
      }
      static::creating(function (self $model) {
            if($model->shouldGenerateId()) {
              $model->setAttribute('global', Str::uuid());
            }
        });
    }

    protected static function shouldGenerateId()
    {
      return true;
    }
}
