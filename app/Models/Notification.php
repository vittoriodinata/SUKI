<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['user_id', 'competition_id', 'title', 'message', 'notification_type', 'read_at'];
    protected function casts(): array { return ['read_at' => 'datetime']; }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function competition(): BelongsTo { return $this->belongsTo(Competition::class); }
}
