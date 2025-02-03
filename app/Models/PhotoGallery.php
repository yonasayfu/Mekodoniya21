<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_url',
        'description',
        'imageable_id',
        'imageable_type',
    ];

    // Define the polymorphic relationship
    public function imageable()
    {
        return $this->morphTo();
    }
}
