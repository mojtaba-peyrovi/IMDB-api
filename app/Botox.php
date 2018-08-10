<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Botox
 *
 * @package App
 * @property string $botox_name
 * @property decimal $price_per_unit
 * @property decimal $price_per_vial
 * @property integer $reward_points
 * @property tinyInteger $popular
 * @property tinyInteger $apply_btn
 * @property string $expire
 * @property tinyInteger $exclusive
 * @property text $exclusive_desc
 * @property tinyInteger $featured
 * @property text $featured_desc
 * @property tinyInteger $off_peak_available
 * @property text $about_offpeak
 * @property text $about_package
 * @property string $clinic_name
*/
class Botox extends Model
{
    use SoftDeletes;

    protected $fillable = ['botox_name', 'price_per_unit', 'price_per_vial', 'reward_points', 'popular', 'apply_btn', 'expire', 'exclusive', 'exclusive_desc', 'featured', 'featured_desc', 'off_peak_available', 'about_offpeak', 'about_package', 'clinic_name_id'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPricePerUnitAttribute($input)
    {
        $this->attributes['price_per_unit'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPricePerVialAttribute($input)
    {
        $this->attributes['price_per_vial'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setRewardPointsAttribute($input)
    {
        $this->attributes['reward_points'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setExpireAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['expire'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['expire'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getExpireAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setClinicNameIdAttribute($input)
    {
        $this->attributes['clinic_name_id'] = $input ? $input : null;
    }
    
    public function clinic_name()
    {
        return $this->belongsTo(Clinic::class, 'clinic_name_id')->withTrashed();
    }
    
}
