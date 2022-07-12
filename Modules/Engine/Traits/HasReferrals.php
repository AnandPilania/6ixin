<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Referral;

trait HasReferrals
{
    public static function bootHasReferrals()
    {
      if (app()->runningInConsole()) {
          return;
      }
         // static::created(function (self $model) {
         //       if($model->shouldGenerateReferrals()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateReferrals()
    {
      return true;
    }

    public function referrals()
    {
       return $this->morphMany(Referral::class, 'author');
    }

    public function userReferrals()
    {
       return $this->hasMany(Referral::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
