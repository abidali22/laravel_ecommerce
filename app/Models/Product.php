<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $fillable = [
        'name',       
        'slug',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'SKU',
        'stock_status',
        'featured',
        'quantity',
        'image',
        'images',
        'category_id',
        'deleted_at',
        'created_at',
        'modified_at',
    ];

    /** 
    * @author               Abid
    * date                  22-11-2021
    * Detail                Get AR Credit Memo date attribute
    * @param                date
    * @return               date
    */
    public function getCreatedAtAttribute($value)
    {
        if ( ! empty($value)) {
            $CarbonDate = Carbon::parse($value);
            return ($CarbonDate->timestamp >= 0) ? $CarbonDate->format(config('general.carbon_date_format')) : null;
        }
        return $value;
    }

    /** 
    * @author        Abid
    * date           22-11-2021
    * Detail         Set AR Credit Memo date attribute
    * @param         date
    * @return        date
    */
    public function setCreatedAtAttribute($value)
    {
        if ( ! empty($value)) {
            $value
                = Carbon::createFromFormat(config('general.carbon_date_format'),
                $value)->toDateString();
        }
        $this->attributes['created_at'] = $value;
    }

    public function category()
    {
        return $this->belongsTo( 'App\Models\Category','category_id');
    }
}
