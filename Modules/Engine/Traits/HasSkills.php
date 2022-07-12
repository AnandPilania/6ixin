<?php

namespace Modules\Engine\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Engine\Entities\Skill;

trait HasSkills
{
    public static function bootHasSkills()
    {
         // static::created(function (self $model) {
         //       if($model->shouldGenerateSkill()) {
         //
         //          }
         //    });
    }

    protected static function shouldGenerateSkill()
    {
      return true;
    }

    public function userSkills()
    {
       return $this->hasMany(Skill::class,config('engine.column_names.foreign_user'),config('engine.column_names.local_user'));
    }
}
