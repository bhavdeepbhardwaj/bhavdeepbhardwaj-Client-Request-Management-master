<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'helpCategory_id',
        'case_id',
        'title',
        'summary',
        'reference_file',
    ];
}
