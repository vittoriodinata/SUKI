<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavedSearch extends Model
{
    protected $fillable = ['user_id', 'keyword', 'category_id', 'min_fee', 'max_fee', 'competition_level', 'difficulty_level', 'competition_mode', 'region', 'is_active'];
    protected function casts(): array { return ['min_fee' => 'decimal:2', 'max_fee' => 'decimal:2', 'is_active' => 'boolean']; }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
}
