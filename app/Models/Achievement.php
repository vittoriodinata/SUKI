<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achievement extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'competition_id', 'achievement_title', 'achievement_description', 'achievement_type', 'achievement_date', 'certificate_url'];
    protected function casts(): array { return ['achievement_date' => 'date']; }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function competition(): BelongsTo { return $this->belongsTo(Competition::class); }
}
