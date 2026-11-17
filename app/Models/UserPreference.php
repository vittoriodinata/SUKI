<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo};

class UserPreference extends Model
{
    protected $fillable = ['user_id', 'preferred_category_id', 'preferred_level', 'preferred_mode', 'max_budget', 'preferred_region'];
    protected function casts(): array { return ['max_budget' => 'decimal:2']; }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function preferredCategory(): BelongsTo { return $this->belongsTo(Category::class, 'preferred_category_id'); }
}
