<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbilityAssessment extends Model
{
    protected $fillable = ['user_id', 'category_id', 'ability_score', 'ability_level', 'assessment_result', 'assessed_at'];
    protected function casts(): array { return ['ability_score' => 'decimal:2', 'assessment_result' => 'array', 'assessed_at' => 'datetime']; }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
}
