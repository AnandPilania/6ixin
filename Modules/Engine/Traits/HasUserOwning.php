<?php

namespace Modules\Engine\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait HasUserOwning
{
    public static function bootHasUserOwning()
    {
        if (app()->runningInConsole()) {
            return;
        }
        static::creating(function (Model $model) {
            if (!auth()->check()) {
                return;
            }
            $model->user_global = auth()->user()->globalId();
          });

          // static::created(function (Model $model) {
          //     if (!auth()->check()) {
          //         return;
          //     }
          //     $model->setAttribute('owner_id', $model->id);
          //     $model->setAttribute('owner_type',$model::class);
          //     //
          //     $model->owner_id = $model->id;
          //     $model->owner_type = $model::class;
          // });

        }



        // static::addGlobalScope('user_filter', function (Builder $query) {
        //     if (!auth()->check() || auth()->user()->is_admin) {
        //         return;
        //     }
        //
        //     $team_id = auth()->user()->is_team_owner ? auth()->user()->ownedTeam->id : auth()->user()->team_id;
        //
        //     $query->where((new static())->getTable() . '.team_id', $team_id);
        // });

}
