<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class RegistrationField extends Model
{
    use HasFactory;
    protected $fillable = [
        'offices_title',
        'ownership',
        'city',
        'county',
        'address',
        'postal_code',
        'area',
        'office_type',
        'phone_numbers',
        'fax_numbers',
        'foundation_administrative_management',
        'foundation_research_engineering',
        'foundation_laboratory',
        'foundation_welfare_service',
        'foundation_workshop',
    ];
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function trackingCode(): HasOne
    {
        return $this->hasone(TrackingCode::class);
    }
}
