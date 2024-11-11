<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'subcategory_id',
        'divisions_id',
        'district_id',
        'area_id',
        'condition_value',
        'authenticity_value',
        'brand_id',
        'model_id',
        'edition',
        'checkbox-1',
        'checkbox-2',
        'checkbox-3',
        'checkbox-4',
        'checkbox-5',
        'checkbox-6',
        'checkbox-7',
        'checkbox-8',
        'checkbox-9',
        'checkbox-10',
        'checkbox-11',
        'checkbox-12',
        'checkbox-13',
        'checkbox-14',
        'checkbox-15',
        'checkbox-16',
        'checkbox-17',
        'checkbox-18',
        'checkbox-19',
        'checkbox-20',
        'checkbox-21',
        'checkbox-22',
        'checkbox-23',
        'checkbox-24',
        'checkbox-25',
        'checkbox-26',
        'checkbox-27',
        'checkbox-28',
        'description',
        'price',
        'img_one',
        'img_two',
        'img_three',
        'img_four',
        'img_five',
        'img_six',
        'name',
        'phone',
        'membership_no',
        'status',
    ];
}
