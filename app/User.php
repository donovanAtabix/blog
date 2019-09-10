<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar_name',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')->acceptsFile(function (File $file) {
            return $file->mimeType === 'image/png' || $file->mimeType === 'image/jpeg'
                || $file->mimeType == 'image/gif';
        })->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('thumb')->width(50)->height(50)->sharpen(10);
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function avatar()
    {
        return $this->hasOne(Media::class, 'avatar_id');
    }

    public function getDisplayNameAttribute()
    {
        if ($this->switch_display_name == false) {
            return $this->avatar_name;
        }

        return $this->name;
    }

    public function getAvatarThumbAttribute()
    {
        return $this->getFirstMediaUrl('avatar', 'thumb');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
