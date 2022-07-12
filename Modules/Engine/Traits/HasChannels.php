<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Channel;

trait HasChannels
{
    public static function bootHasChannels()
    {
         // static::created(function (self $model) {
         //       if($model->shouldGenerateChannel()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateChannel()
    {
      return true;
    }

    public function userChannels()
    {
       return $this->hasMany(Channel::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
