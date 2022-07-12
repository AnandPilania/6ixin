<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Poll;

trait HasPolls
{
    public static function bootHasPolls()
    {
         // static::created(function (self $model) {
         //       if($model->shouldGeneratePoll()) {
         //
         //          }
         //    });
    }

    protected static function shouldGeneratePoll()
    {
      return true;
    }

    public function userPolls()
    {
       return $this->hasMany(Poll::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
