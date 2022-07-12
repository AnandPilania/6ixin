<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Job;

trait HasJobs
{
    public static function bootHasJobs()
    {
      if (app()->runningInConsole()) {
          return;
      }
         // static::created(function (self $model) {
         //       if($model->shouldGenerateWallet()) {
         //           $model->wallets()->create([
         //              'name' => 'Main Wallet',
         //              'code' => Str::uuid(),
         //              'key' => 'default_USD',
         //            ]);
         //          }
         //    });
    }

    protected static function shouldHaveJobs()
    {
      return true;
    }

    public function jobs()
    {
       return $this->morphMany(Job::class, 'author');
    }

    public function userJobs()
    {
       return $this->hasMany(Job::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
