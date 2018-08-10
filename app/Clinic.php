<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Clinic
 *
 * @package App
 * @property string $clinic_name
 * @property string $logo
 * @property string $city
 * @property string $area
 * @property string $location
*/
class Clinic extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['clinic_name', 'logo', 'city', 'area', 'location_address', 'location_latitude', 'location_longitude'];
    protected $hidden = [];
    
    
    
}
