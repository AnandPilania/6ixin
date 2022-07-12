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

class Field extends Model
{
    use HasFactory, SoftDeletes, HasSlug, SortableTrait, GlobalUniqueIdentifierTrait, HasTranslations, HasAdvancedFilter, SchemalessAttributesTrait, HasDataAndProperties;

    public $table = 'engine_fields';

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
        'author_id',
        'author_type',
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
        'author_id',
        'author_type',
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
      'author_id',
      'author_type',
      'global',
  ];

  public $sortable = [
      'order_column_name' => 'sort_order',
      'sort_when_creating' => true,
  ];

    protected static function newFactory()
    {
        return \Modules\Engine\Database\factories\FieldFactory::new();
    }

    public function events()
    {
        return $this->belongsToMany(Event::class,config('engine.table_names.event_field'));
    }

    public function organizations()
    {
      return $this->belongsToMany(Organization::class,config('engine.table_names.organization_field'));
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class,config('engine.table_names.field_sector'));
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class,config('engine.table_names.field_skill'));
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class,config('engine.table_names.job_field'));
    }

    public function threads()
    {
        return $this->belongsToMany(Thread::class,config('engine.table_names.thread_field'));
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class,config('engine.table_names.topic_field'));
    }



    public function getSlugOptions() : SlugOptions
    {
      return SlugOptions::create()
         ->generateSlugsFrom('name')
         ->saveSlugsTo('slug')
         ->slugsShouldBeNoLongerThan(36);
    }

}
