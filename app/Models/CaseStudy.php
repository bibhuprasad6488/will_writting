<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    use HasFactory;
    protected $table = 'case_studies';
    protected $fillable = [
        'title',
        'slug',
        'image',
        'short_desc',
        'long_desc',
        'meta_title',
        'meta_keywords',
        'meta_desc',
        'status',
        'created_at',
        'updated_at'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
