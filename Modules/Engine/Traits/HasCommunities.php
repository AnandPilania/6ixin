<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Community;

trait HasCommunities
{
    public static function bootHasCommunities()
    {
         // static::created(function (self $model) {
         //       if($model->shouldGenerateCommunity()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateCommunity()
    {
      return true;
    }

    public function userCommunities()
    {
       return $this->hasMany(Community::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
