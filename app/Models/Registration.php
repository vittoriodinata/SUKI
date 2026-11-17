<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    protected $fillable = ['competition_id', 'user_id', 'team_id', 'registration_code', 'registered_at', 'registration_status', 'payment_status', 'notes'];
    protected function casts(): array { return ['registered_at' => 'datetime']; }
    public function competition(): BelongsTo { return $this->belongsTo(Competition::class); }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function team(): BelongsTo { return $this->belongsTo(Team::class); }
}
