<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopping extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'createddate'];
    public $timestamps = false;
}