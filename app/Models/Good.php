<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'name'];
    public function users() {
        return $this->belongsToMany(User::class)->withPivot(['created_at','amount']);;
    }
}
