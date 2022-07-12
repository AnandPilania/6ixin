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

class Template extends Model
{
    use HasFactory, SoftDeletes, HasSlug, GlobalUniqueIdentifierTrait, SortableTrait,  HasTranslations, HasAdvancedFilter, HasUserOwning, SchemalessAttributesTrait, HasDataAndProperties;

    public $table = 'blog_templates';

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
      'tenant_id',
      'user_global',
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
      'tenant_id',
      'user_global',
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
       'tenant_id',
       'user_global',
       'global',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class,config('engine.table_names.template_field'));
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class,config('engine.table_names.template_sector'));
    }

    public function tags()
    {
        // return $this->belongsToMany(Tag::class,config('engine.table_names.thread_template'));
    }


    public function getSlugOptions() : SlugOptions
    {
      return SlugOptions::create()
         ->generateSlugsFrom('title')
         ->saveSlugsTo('slug')
         ->slugsShouldBeNoLongerThan(36);
    }

}
