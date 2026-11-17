<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompetitionRequirement extends Model
{
    protected $fillable = ['competition_id', 'requirement_title', 'requirement_description', 'sort_order'];
    protected function casts(): array { return ['sort_order' => 'integer']; }
    public function competition(): BelongsTo { return $this->belongsTo(Competition::class); }
}
