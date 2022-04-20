<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CVs extends Model
{
    use HasFactory;
    protected $fillable = [
        "name", "email", "keyProgrammingLanguage","education",  "profile", "URLlinks", "user_id"
    ];
}
