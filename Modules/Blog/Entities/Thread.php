<?php

namespace Modules\Blog\Entities;

use \DateTimeInterface;
use App\Alpha\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Modules\Base\Traits\GlobalUniqueIdentifierTrait;
use Modules\Engine\Traits\HasUserOwning;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;
use Modules\Engine\Traits\HasDataAndProperties;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Thread extends Model
{
    use HasFactory, SoftDeletes, HasSlug, GlobalUniqueIdentifierTrait,SortableTrait, HasTranslations, HasAdvancedFilter, SchemalessAttributesTrait, HasDataAndProperties;

    public $table = 'blog_threads';

    public $translatable = ['title','body'];

    protected $casts = ['title' => 'array','body' => 'array', 'is_public'   => 'boolean', 'is_featured' => 'boolean',];

    public $filterable = [
        'id',
        'data',
        'title',
        'slug',
        'properties',
        'body',
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
        'title',
        'slug',
        'properties',
        'body',
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
        'title',
        'properties',
        'body',
        'is_public',
        'is_featured',
        'level',
        'sort_order',
        'rank',
        'author_id',
        'author_type',
        'user_global',
        'tenant_id',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
      return $this->belongsToMany(Category::class,config('engine.table_names.thread_category'));
    }

    public function fields()
    {
      return $this->belongsToMany(Field::class,config('engine.table_names.thread_field'));
    }

    public function sectors()
    {
      return $this->belongsToMany(Sector::class,config('engine.table_names.thread_sector'));
    }

    public function skills()
    {
      return $this->belongsToMany(Skill::class,config('engine.table_names.thread_skill'));
    }

    public function topics()
    {
      return $this->belongsToMany(Topic::class,config('engine.table_names.thread_topic'));
    }

    public function getSlugOptions() : SlugOptions
    {
      return SlugOptions::create()
         ->generateSlugsFrom('title')
         ->saveSlugsTo('slug')
         ->slugsShouldBeNoLongerThan(36);
    }

}
