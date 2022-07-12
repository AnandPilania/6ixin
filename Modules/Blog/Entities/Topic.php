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

class Topic extends Model
{
    use HasFactory, SoftDeletes, HasSlug, GlobalUniqueIdentifierTrait, SortableTrait,  HasTranslations, HasAdvancedFilter, HasUserOwning, SchemalessAttributesTrait, HasDataAndProperties;

    public $table = 'blog_topics';

    public $translatable = ['title','body'];

    protected $casts = ['title' => 'array','body' => 'array', 'is_public'   => 'boolean', 'is_default'   => 'boolean', 'is_featured' => 'boolean',];

    public $filterable = [
      'title',
      'code',
      'reference',
      'properties',
      'body',
      'value',
      'is_default',
      'is_public',
      'is_featured',
      'level',
      'sort_order',
      'rank',
      'author_id',
      'author_type',
    ];

    public $orderable = [
      'id',
      'title',
      'code',
      'reference',
      'properties',
      'body',
      'value',
      'is_default',
      'is_public',
      'is_featured',
      'level',
      'sort_order',
      'rank',
      'author_id',
      'author_type',
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
        'code',
        'reference',
        'properties',
        'body',
        'value',
        'is_default',
        'is_public',
        'is_featured',
        'level',
        'sort_order',
        'rank',
        'owner_id',
        'owner_type',
        'user_global',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function events()
    {
        return $this->belongsToMany(Event::class,config('engine.table_names.event_topic'));
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class,config('engine.table_names.topic_field'));
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class,config('engine.table_names.topic_sector'));
    }

    public function tags()
    {
        // return $this->belongsToMany(Tag::class,config('engine.table_names.thread_topic'));
    }

        public function threads()
    {
        return $this->belongsToMany(Thread::class,config('engine.table_names.thread_topic'));
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class,config('engine.table_names.topic_skill'));
    }

    public function getSlugOptions() : SlugOptions
    {
      return SlugOptions::create()
         ->generateSlugsFrom('title')
         ->saveSlugsTo('slug')
         ->slugsShouldBeNoLongerThan(36);
    }

}
