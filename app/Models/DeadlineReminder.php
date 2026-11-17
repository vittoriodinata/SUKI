<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeadlineReminder extends Model
{
    protected $fillable = ['user_id', 'competition_id', 'remind_at', 'sent_at'];
    protected function casts(): array { return ['remind_at' => 'datetime', 'sent_at' => 'datetime']; }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function competition(): BelongsTo { return $this->belongsTo(Competition::class); }
}
