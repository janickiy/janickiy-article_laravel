<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'img',
        'slug',
    ];

    public $dates = ['published_at'];

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @returnHasOne
     */
    public function state(): HasOne
    {
        return $this->hasOne(State::class);
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getBodyPreview()
    {
        return Str::limit($this->body, 100);
    }

    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * @param $query
     * @param int $numbers
     * @return mixed
     */
    public function scopeLastLimit($query, int $numbers)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->limit($numbers)->get();
    }

    /**
     * @param $query
     * @param int $numbers
     * @return mixed
     */
    public function scopeAllPaginate($query, int $numbers)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($numbers);
    }

    /**
     * @param $query
     * @param string $slug
     * @return mixed
     */
    public function scopeFindBySlug($query, string $slug)
    {
        return $query->with('comments', 'tags', 'state')->where('slug', $slug)->firstOrFail();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFindByTag($query)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate(10);
    }
}
