<?php

namespace Modules\Account\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
// use Modules\Account\Traits\HasWallet;
// use Modules\Engine\Traits\HasApplications;
// use Modules\Engine\Traits\HasChannels;
// use Modules\Engine\Traits\HasCommunities;
// use Modules\Engine\Traits\HasDirectories;
// use Modules\Engine\Traits\HasEvents;
// use Modules\Engine\Traits\HasJobs;
// use Modules\Engine\Traits\HasPortfolios;
// use Modules\Engine\Traits\HasReferrals;
// use Modules\Engine\Traits\HasResumes;
// use Modules\Engine\Traits\HasSkills;
// use Modules\Engine\Traits\HasTemplates;
// use Modules\Engine\Traits\HasThreads;
// use Modules\Engine\Traits\HasTodos;
// use Modules\Engine\Traits\HasTopics;
use Modules\Base\Traits\GlobalUniqueIdentifierTrait;
// use Spatie\Searchable\Searchable;
// use Spatie\Searchable\SearchResult;
use Spatie\Permission\Traits\HasRoles;

class BaseUser extends Authenticatable
{
    use HasFactory;
    use HasSlug;
    use GlobalUniqueIdentifierTrait;
    // use HasRoles;
    // use HasThreads;
    // use HasCommunities;
    // use HasSkills;
    // use HasTopics;
    // use HasEvents;
    // use HasJobs;
    // use HasDirectories;
    // use HasResumes;
    // use HasApplications;
    // use HasChannels;
    // use HasPortfolios;
    // use HasReferrals;
    // use HasTemplates;
    // use HasTodos;


    protected $table = 'users';

    protected $appends = [
        'creation',
    ];
    public function isDefaultUser(): bool
    {
        return $this->type === 'user';
    }

    public function isAdminUser(): bool
    {
        return $this->type === 'admin';
    }

    public function isTenant(): bool
    {
        return $this->type === TYPE_SELECT['tenant']['tenant'];
    }

    public const TITLE_SELECT = [
      'Mr'   =>  [
                   'value' => 1,
                   'name'  =>  'Mr',
                 ],
      'Mrs'   => [
                   'value' => 2,
                   'name'  =>  'Mrs',
                 ],
      'Ms'   =>  [
                    'value' => 3,
                    'name'  =>  'Ms',
                 ],
      'Miss' =>  [
                   'value' => 4,
                   'name'  =>  'Miss',
                 ],
      'Dr'   =>  [
                  'value' => 5,
                  'name'  =>  'Dr',
                 ],
    ];

    public const TYPE_SELECT = [
      'admin'  => [
        'value' => 1000,
      ],
      'tenant' => [
        'value' => 2000,
      ],
      'user'   => [
        'value' => 3000,
      ],

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function scopeAdmins()
    {
        return $this->whereHas('roles', fn ($q) => $q->where('title', 'Admin'));
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function getCreationAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getdisplayUsernameAttribute()
    {
        return '@'.$this->username;
    }

    public function logins()
    {
        return $this->hasMany(Login::class);
    }

    public function lastLogin()
    {
        return $this->belongsTo(Login::class);
    }

    public function globalId()
    {
        return $this->global;
    }

    public function scopeWithLastLogin($query)
    {
        $query->addSelect(['last_login_id' => Login::select('id')
            ->whereColumn('user_id', 'users.id')
            ->latest()
            ->take(1),
        ])->with('lastLogin');
    }

    protected static function newFactory()
    {
        return \Modules\Account\Database\factories\BaseUserFactory::new();
    }

    public function getSlugOptions() : SlugOptions
    {
      return SlugOptions::create()
         ->generateSlugsFrom('username')
         ->saveSlugsTo('username')
         ->slugsShouldBeNoLongerThan(36);
    }
}
