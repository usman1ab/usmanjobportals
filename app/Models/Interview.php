<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = ['job_id', 'user_id', 'scheduled_at', 'location', 'link','notes','status'];
     protected $casts = [
        'scheduled_at' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
     public function score(){
        return $this->hasOne(Selection::class);
    }
    public function FeedBack(){
        return $this->hasMany(FeedBack::class);
    }
}
