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
        return $this->hasMany(Category::class);
    }

    public function countries()
    {
        return $this->hasOne(Country::class);
    }

}
