<?php

namespace Modules\Engine\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

trait HasDataAndProperties
{
  public function initializeHasDataAndProperties()
  {
    $this->casts['data'] = SchemalessAttributes::class;
    $this->casts['properties'] = SchemalessAttributes::class;
  }

  public function scopeWithData(): Builder
  {
     return $this->data->modelScope();
  }

  public function scopeWithProperties(): Builder
  {
     return $this->properties->modelScope();
  }
}
