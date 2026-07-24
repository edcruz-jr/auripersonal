<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['description'])]

class Gender extends Model
{
    use HasFactory;

    protected $dateFormat = 'Ymd H:i:s';
}
