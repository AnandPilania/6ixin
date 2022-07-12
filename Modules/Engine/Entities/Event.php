<?php

namespace Modules\Engine\Entities;

use \DateTimeInterface;
use Carbon\Carbon;
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

class Event extends Model
{
      use HasFactory, SoftDeletes, HasSlug, GlobalUniqueIdentifierTrait, HasTranslations, HasAdvancedFilter, SchemalessAttributesTrait, HasDataAndProperties;

      public const TYPE_SELECT = [
          '0' => 'Public',
          '1' => 'Private to Group',
      ];

      public const FREQUENCE_SELECT = [
        'once' => [
            'id' => 1,
            'name' => 'Once',
            'key' => 'once',
            'logo' => 'event_once',
        ],
        'daily' => [
            'id' => 2,
            'name' => 'Daily',
            'key' => 'daily',
            'logo' => 'event_daily',
        ],
        'weekly' => [
            'id' => 3,
            'name' => 'Weekly',
            'key' => 'weekly',
            'logo' => 'event_weekly',
        ],
        'monthly' => [
            'id' => 4,
            'name' => 'Monthly',
            'key' => 'monthly',
            'logo' => 'event_monthly',
        ],
        'yearly' => [
            'id' => 5,
            'name' => 'Yearly',
            'key' => 'yearly',
            'logo' => 'event_yearly',
        ],
        'specific' => [
            'id' => 6,
            'name' => 'Specific',
            'key' => 'specific',
            'logo' => 'event_specific',
        ],

      ];

      public $table = 'engine_events';

      public $translatable = ['title','description','slogan'];

      protected $casts = ['title' => 'array','description' => 'array','slogan' => 'array','is_featured' => 'boolean','is_active'   => 'boolean','is_private'  => 'boolean','is_hidden'   => 'boolean',];

      public $orderable = [
          'id',
          'title',
          'slug',
          'description',
          'type_id',
          'address',
          'url',
          'properties',
          'note',
          'is_featured',
          'is_active',
          'frequence_id',
          'reference',
          'author_id',
          'author_type',
          'starting_date',
          'starting_time',
          'ending_time',
          'duration',
          'is_private',
          'is_hidden',
          'organization_id',
          'global',
      ];

      public $filterable = [
          'id',
          'title',
          'slogan',
          'description',
          'topics.title',
          'communities.name',
          'organizations.title',
          'type_id',
          'address',
          'url',
          'properties',
          'note',
          'frequence_id',
          'reference',
          'duration',
          'starting_date',
          'starting_time',
          'ending_time',
          'author_id',
          'author_type',
          'organization_id',
          'global',
      ];

      protected $dates = [
          'ending_time',
          'created_at',
          'updated_at',
          'deleted_at',
      ];


      protected $fillable = [
          'title',
          'slug',
          'slogan',
          'description',
          'type_id',
          'address',
          'url',
          'properties',
          'note',
          'is_featured',
          'is_active',
          'reference',
          'frequence_id',
          'user_global',
          'author_id',
          'author_type',
          'duration',
          'starting_date',
          'starting_time',
          'ending_time',
          'is_private',
          'is_hidden',
          'tenant_id',
          'location_id',
          'global',
      ];

      public function getRouteKeyName()
      {
          return 'slug';
      }

      protected static function newFactory()
      {
          return \Modules\Engine\Database\factories\EventFactory::new();
      }

      // public function getStartingTimeAttribute($value)
      // {
      //     return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
      // }
      //
      // public function setStartingTimeAttribute($value)
      // {
      //     $this->attributes['starting_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
      // }
      //
      // public function getEndingTimeAttribute($value)
      // {
      //     return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
      // }
      //
      // public function setEndingTimeAttribute($value)
      // {
      //     $this->attributes['ending_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
      // }

      public function getTypeLabelAttribute($value)
      {
          return static::TYPE_SELECT[$this->type] ?? null;
      }

      public function categories()
      {
          return $this->belongsToMany(Category::class, config('engine.table_names.event_category'));
      }

      public function emplacements()
      {
          return $this->belongsToMany(Emplacement::class, config('engine.table_names.event_emplacement'));
      }

      public function fields()
      {
          return $this->belongsToMany(Field::class, config('engine.table_names.event_field'));
      }

      public function sectors()
      {
          return $this->belongsToMany(Sector::class, config('engine.table_names.event_sector'));
      }

      public function skills()
      {
          return $this->belongsToMany(Skill::class, config('engine.table_names.event_skill'));
      }

      public function topics()
      {
          // return $this->belongsToMany(Topic::class, config('engine.table_names.event_topic'));
      }

      protected function serializeDate(DateTimeInterface $date)
      {
          return $date->format('Y-m-d H:i:s');
      }

      public function getSlugOptions() : SlugOptions
      {
        return SlugOptions::create()
           ->generateSlugsFrom('title')
           ->saveSlugsTo('slug')
           ->slugsShouldBeNoLongerThan(36);
      }

}
