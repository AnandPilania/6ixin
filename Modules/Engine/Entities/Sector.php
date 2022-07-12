<?php

namespace Modules\Engine\Entities;

use \DateTimeInterface;
use App\Alpha\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Modules\Base\Traits\GlobalUniqueIdentifierTrait;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;
use Modules\Engine\Traits\HasDataAndProperties;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Sector extends Model
{
    use HasFactory, SortableTrait, SoftDeletes, HasSlug, GlobalUniqueIdentifierTrait, HasTranslations, HasAdvancedFilter, SchemalessAttributesTrait, HasDataAndProperties;

    public $table = 'engine_sectors';

    public $translatable = ['name','description'];

    protected $casts = ['name' => 'array','description' => 'array', 'is_public'   => 'boolean', 'is_featured' => 'boolean',];

    public $filterable = [
        'id',
        'data',
        'name',
        'slug',
        'properties',
        'description',
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
        // 'photo',
        // 'sliders',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function industries()
    {
        return $this->belongsToMany(Industry::class, config('engine.table_names.industry_sector'));
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, config('engine.table_names.event_sector'));
    }

    public function jobs()
    {
      return $this->belongsToMany(Job::class,config('engine.table_names.job_sector'),);
    }


    public function getSlugOptions() : SlugOptions
    {
      return SlugOptions::create()
         ->generateSlugsFrom('name')
         ->saveSlugsTo('slug')
         ->slugsShouldBeNoLongerThan(36);
    }

    protected static function newFactory()
    {
        return \Modules\Engine\Database\factories\SectorFactory::new();
    }
}
