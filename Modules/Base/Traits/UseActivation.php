<?php

namespace Modules\Base\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait UseActivation
{
    public static function bootUseActivationTrait()
    {
       static::creating(function (self $model) {
           $data = $this->shouldBeActiveByDefault();
            if ($data) {
              $model->setAttribute('is_active', $data);
            }
        });
    }

    public function isActive()
    {
        return ($this->is_active === 1) ? __('Yes') : __('No');
    }

    protected static function shouldBeActiveByDefault()
    {
      return false;
    }
}
