<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionOption extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['id', 'created_at', 'updated_at'];

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
