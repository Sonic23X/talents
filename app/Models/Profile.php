<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'phone',
        'facebook',
        'twitter',
        'linkedin',
        'work_id',
        'picture',
        'type',
        'user_id',
        'client_id',
        'views',
        'downloads'
    ];

    public function images() {
        return $this->hasMany(Image::class);
    }
}
