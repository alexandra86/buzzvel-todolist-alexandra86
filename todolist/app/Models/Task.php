<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'its_finished',
        'created_at',
        'updated_at',
        
    ];


    public function userTask(){
        return $this->belongsTo(User::class, 'user_id');
    }

}

