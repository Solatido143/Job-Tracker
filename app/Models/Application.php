<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'job_title',
        'company',
        'status',
        'applied_at',
        'notes',
        'resume_id',
    ];

    protected $casts = [
        'applied_at' => 'date',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
