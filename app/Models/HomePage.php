<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'favicon',
        'header_logo',
        'banner_one',
        'banner_two',
        'banner_three',
        'under_content',
        'about_us',
        'careers',
        'terms_condition',
        'privacy_policy',
        'faq',
        'contact_us',
        'company_name',
        'company_address',
        'email',
        'phone',
        'hotline',
        'facebook',
        'instagram',
        'youtube',
        'linkedin',
        'android_app_link',
        'android_app_image',
        'ios_app_link',
        'ios_app_image',
        'footer_logo',
    ];

}
