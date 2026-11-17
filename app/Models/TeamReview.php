<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamReview extends Model
{
    protected $fillable = ['team_id', 'reviewer_id', 'reviewed_user_id', 'rating', 'review_description'];
    protected function casts(): array { return ['rating' => 'integer']; }
    public function team(): BelongsTo { return $this->belongsTo(Team::class); }
    public function reviewer(): BelongsTo { return $this->belongsTo(User::class, 'reviewer_id'); }
    public function reviewedUser(): BelongsTo { return $this->belongsTo(User::class, 'reviewed_user_id'); }
}
