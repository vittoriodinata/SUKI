<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreparationResource extends Model
{
    use SoftDeletes;
    protected $fillable = ['competition_id', 'category_id', 'resource_title', 'resource_description', 'resource_type', 'resource_url'];
    public function competition(): BelongsTo { return $this->belongsTo(Competition::class); }
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
}
