<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Event;

trait HasEvents
{
    public static function bootHasEvents()
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

    protected static function shouldHaveEvents()
    {
      return true;
    }

    public function events()
    {
       return $this->morphMany(Event::class, 'author');
    }

    public function userEvents()
    {
       return $this->hasMany(Event::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
