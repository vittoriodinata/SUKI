<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, BelongsToMany};

class Team extends Model
{
    use SoftDeletes;
    protected $fillable = ['competition_id', 'leader_id', 'team_name', 'description', 'team_status'];
    public function competition(): BelongsTo { return $this->belongsTo(Competition::class); }
    public function leader(): BelongsTo { return $this->belongsTo(User::class, 'leader_id'); }
    public function members(): HasMany { return $this->hasMany(TeamMember::class); }
    public function users(): BelongsToMany { return $this->belongsToMany(User::class, 'team_members')->withPivot(['id', 'member_role', 'membership_status', 'joined_at'])->withTimestamps(); }
    public function registrations(): HasMany { return $this->hasMany(Registration::class); }
    public function reviews(): HasMany { return $this->hasMany(TeamReview::class); }
}
