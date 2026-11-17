<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Competition extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'organizer_id',
        'category_id',
        'competition_name',
        'description',
        'competition_type',
        'competition_mode',
        'difficulty_level',
        'competition_level',
        'registration_fee',
        'currency',
        'prizepool',
        'min_team_members',
        'max_team_members',
        'region',
        'city',
        'country',
        'registration_start',
        'registration_deadline',
        'competition_start',
        'competition_end',
        'poster_url',
        'registration_url',
        'official_url',
        'significance',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'registration_fee' => 'decimal:2',
            'prizepool' => 'decimal:2',
            'min_team_members' => 'integer',
            'max_team_members' => 'integer',
            'registration_start' => 'datetime',
            'registration_deadline' => 'datetime',
            'competition_start' => 'datetime',
            'competition_end' => 'datetime',
        ];
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function requirements()
    {
        return $this->hasMany(CompetitionRequirement::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function reminders()
    {
        return $this->hasMany(DeadlineReminder::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    public function preparationResources()
    {
        return $this->hasMany(PreparationResource::class);
    }
}
