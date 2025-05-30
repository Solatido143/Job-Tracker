<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'orignal_name',
        'file_path',
    ];

    public function JobApplications() {
        return $this->hasMany(Application::class);
    }
}
