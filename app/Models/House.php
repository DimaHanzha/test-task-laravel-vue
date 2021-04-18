<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class House
 *
 * @property int $id
 * @property string $name
 * @property int $storeys
 * @property int $bedrooms
 * @property int $bathrooms
 * @property int $garages
 * @property string $created_at
 * @property string $updated_at
 *
 * @package App\Models
 */
class House extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'
    ];
}
