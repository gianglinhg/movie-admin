<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Episode;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'origin_name',
        'slug',
        'content',
        'thumb_url',
        'poster_url',
        'type',
        'status',
        'trailer_url',
        'episode_time',
        'episode_current',
        'episode_total',
        'quality',
        'language',
        'notify',
        'showtimes',
        'publish_year',
        'is_shown_in_theater',
        'is_recommended',
        'is_copyright',
        'is_sensitive_content',
        'episode_server_count',
        'episode_data_count',
        'view_total',
        'view_day',
        'view_week',
        'view_month',
        'rating_count',
        'rating_star',
        'update_handler',
        'update_identity',
        'update_checksum',
        'user_id',
        'user_name',
    ];

    public function addEpisode(array $episodes, string $movie_id)
    {
        foreach($episodes as $episode){
            $episode['movie_id'] = $movie_id;
            Episode::create($episode);
        }
    }
    public function directors()
    {
        return $this->belongsToMany(Director::class, 'director_movie', 'movie_id', 'director_id');
    }
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie', 'movie_id', 'actor_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_movie', 'movie_id', 'category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_movie', 'movie_id', 'tag_id');
    }
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'movie_region', 'movie_id', 'region_id');
    }
    public function studios()
    {
        return $this->belongsToMany(Studio::class, 'studio_movie', 'movie_id', 'studio_id');
    }
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
