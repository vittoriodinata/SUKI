<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, HasOne, BelongsToMany};

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'university_id', 'full_name', 'email', 'password', 'student_id',
        'major', 'study_year', 'profile_picture', 'bio', 'role', 'is_active',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function university(): BelongsTo { return $this->belongsTo(University::class); }
    public function bookmarks(): HasMany { return $this->hasMany(Bookmark::class); }
    public function bookmarkedCompetitions(): BelongsToMany { return $this->belongsToMany(Competition::class, 'bookmarks')->withTimestamps(); }
    public function registrations(): HasMany { return $this->hasMany(Registration::class); }
    public function ledTeams(): HasMany { return $this->hasMany(Team::class, 'leader_id'); }
    public function teamMemberships(): HasMany { return $this->hasMany(TeamMember::class); }
    public function teams(): BelongsToMany { return $this->belongsToMany(Team::class, 'team_members')->withPivot(['id', 'member_role', 'membership_status', 'joined_at'])->withTimestamps(); }
    public function notifications(): HasMany { return $this->hasMany(Notification::class); }
    public function deadlineReminders(): HasMany { return $this->hasMany(DeadlineReminder::class); }
    public function preference(): HasOne { return $this->hasOne(UserPreference::class); }
    public function recommendations(): HasMany { return $this->hasMany(Recommendation::class); }
    public function abilityAssessments(): HasMany { return $this->hasMany(AbilityAssessment::class); }
    public function givenReviews(): HasMany { return $this->hasMany(TeamReview::class, 'reviewer_id'); }
    public function receivedReviews(): HasMany { return $this->hasMany(TeamReview::class, 'reviewed_user_id'); }
    public function achievements(): HasMany { return $this->hasMany(Achievement::class); }
    public function savedSearches(): HasMany { return $this->hasMany(SavedSearch::class); }
}
