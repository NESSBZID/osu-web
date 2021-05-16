<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Models;

use App\Traits\Memoizes;
use Carbon\Carbon;

/**
 * @property \Illuminate\Database\Eloquent\Collection $albums ArtistAlbum
 * @property string|null $bandcamp
 * @property \Illuminate\Database\Eloquent\Collection $beatmapsets Beatmapset
 * @property string|null $cover_url
 * @property \Carbon\Carbon|null $created_at
 * @property string $description
 * @property string|null $facebook
 * @property string|null $header_url
 * @property int $id
 * @property Label $label
 * @property int|null $label_id
 * @property string $name
 * @property string|null $patreon
 * @property string|null $soundcloud
 * @property string|null $spotify
 * @property \Illuminate\Database\Eloquent\Collection $tracks ArtistTrack
 * @property string|null $twitter
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $user_id
 * @property int $visible
 * @property string|null $website
 * @property string|null $youtube
 */
class Artist extends Model
{
    use Memoizes;

    public function label()
    {
        return $this->belongsTo(Label::class);
    }

    public function albums()
    {
        return $this->hasMany(ArtistAlbum::class);
    }

    public function beatmapsets()
    {
        return $this->hasMany(Beatmapset::class);
    }

    public function tracks()
    {
        return $this->hasMany(ArtistTrack::class);
    }

    public function hasNewTracks()
    {
        return in_array($this->id, static::recentlyUpdatedArtists(), true);
    }

    public function url()
    {
        return route('artists.show', $this);
    }

    private static function recentlyUpdatedArtists()
    {
        return static::memoizeStatic(__FUNCTION__, function () {
            return cache_remember_mutexed('recentlyUpdatedArtists', 300, [], function () {
                return ArtistTrack::where('created_at', '>', Carbon::now()->subMonth(1))
                    ->select('artist_id')
                    ->groupBy('artist_id')
                    ->get()
                    ->pluck('artist_id')
                    ->toArray();
            });
        });
    }
}
