<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Jobs extends Model
{
    use HasFactory;
    protected $fillable =[
        "job_title",
        "job_desc",
        "job_requirement",
        "job_type",
        "location",                                            
        "link",
        "users_id"
    ];


    public function user() : BelongsTo{
        return $this->belongsTo(User::class );
    }
    
}
