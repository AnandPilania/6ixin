<?php

namespace Modules\Engine\Entities;

use \DateTimeInterface;
use App\Alpha\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Modules\Base\Traits\GlobalUniqueIdentifierTrait;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;
use Modules\Engine\Traits\HasDataAndProperties;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Emplacement extends Model
{
    use HasFactory, SoftDeletes, HasSlug,SortableTrait, GlobalUniqueIdentifierTrait, HasTranslations, HasAdvancedFilter, SchemalessAttributesTrait, HasDataAndProperties;

    public $table = 'engine_emplacements';

    public $translatable = ['name','description'];

    protected $casts = ['name' => 'array','description' => 'array', 'is_public'   => 'boolean', 'is_featured' => 'boolean',];

    public $filterable = [
        'id',
        'data',
        'name',
        'slug',
        'properties',
        'description',
        'is_featured',
        'level',
        'sort_order',
        'rank',
        'global',
    ];

    public $orderable = [
        'id',
        'data',
        'name',
        'slug',
        'properties',
        'description',
        'is_public',
        'is_featured',
        'level',
        'sort_order',
        'rank',
        'global',
    ];

    protected $appends = [
        // 'picture',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     protected $fillable = [
        'name',
        'properties',
        'description',
        'is_public',
        'is_featured',
        'level',
        'sort_order',
        'rank',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function newFactory()
    {
        return \Modules\Engine\Database\factories\EmplacementFactory::new();
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, config('engine.table_names.event_emplacement'));
    }

    public function getSlugOptions() : SlugOptions
    {
      return SlugOptions::create()
         ->generateSlugsFrom('name')
         ->saveSlugsTo('slug')
         ->slugsShouldBeNoLongerThan(36);
    }

}
