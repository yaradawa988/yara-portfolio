<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','description','short_description','tech_stack',
        'cover_image','live_url','github_url','role','featured','started_at','ended_at'
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'featured' => 'boolean',
        'started_at' => 'date',
        'ended_at' => 'date',
    ];

    // helper
    public function getTechStackLabelAttribute()
    {
        return is_array($this->tech_stack) ? implode(', ', $this->tech_stack) : $this->tech_stack;
    }
}
