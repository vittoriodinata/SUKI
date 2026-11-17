<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recommendation extends Model
{
    protected $fillable = ['user_id', 'competition_id', 'recommendation_score', 'recommendation_reason', 'generated_at'];
    protected function casts(): array { return ['recommendation_score' => 'decimal:4', 'generated_at' => 'datetime']; }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function competition(): BelongsTo { return $this->belongsTo(Competition::class); }
}
