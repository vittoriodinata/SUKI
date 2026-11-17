<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organizer extends Model
{
    use SoftDeletes;
    protected $fillable = ['organizer_name', 'organizer_type', 'email', 'website', 'description'];
    public function competitions(): HasMany { return $this->hasMany(Competition::class); }
}
