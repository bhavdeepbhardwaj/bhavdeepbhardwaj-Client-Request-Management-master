<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job',
        'job_no',
        'brand',
        'country',
        'category',
        'priority',
        'status',
        'title',
        'summary',
        'objective',
        'reference',
        'otherinfo',
    ];
}
