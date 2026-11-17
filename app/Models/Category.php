<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['category_name', 'description'];
    public function competitions(): HasMany { return $this->hasMany(Competition::class); }
    public function userPreferences(): HasMany { return $this->hasMany(UserPreference::class, 'preferred_category_id'); }
    public function abilityAssessments(): HasMany { return $this->hasMany(AbilityAssessment::class); }
    public function preparationResources(): HasMany { return $this->hasMany(PreparationResource::class); }
    public function savedSearches(): HasMany { return $this->hasMany(SavedSearch::class); }
}
