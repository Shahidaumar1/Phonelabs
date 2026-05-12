<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'meta_title',
        'buisness_name',
        'website_url',
        'favicon',
        'fb_link',
        'fb_link_status',
        'insta_link',
        'insta_link_status',
        'twitter_link',
        'twitter_link_status',
        'tiktok_link',
        'tiktok_link_status',
        'google_map_profile_link',
        'linkedin_link',
        'linkedin_link_status',
        'snapchat_link',
        'snapchat_link_status',
        'map_link',
    ];
    public static function getSiteSettings()
    {
        return self::latest()->first();
    }
}
