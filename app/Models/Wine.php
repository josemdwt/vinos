<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'date_elaboration',
        'alcohol_content',
        'price',
        'stock',
        'type',
        'category_id',
        'country_id',
        'denomination_id',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function countries()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    public function denominations()
    {
        return $this->belongsTo(Denomination::class, 'denomination_id');
    }

}
