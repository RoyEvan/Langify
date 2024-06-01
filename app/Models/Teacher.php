<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "teachers";
    protected $primaryKey = "teacher_id";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'teacher_id',
        'teacher_username',
        'teacher_password',
        'teacher_name',
        'teacher_email',
        'teacher_address',
        'teacher_phone',
    ];

    public function Course() {
        return $this->hasOne(Course::class, 'teacher_id', 'teacher_id');
    }
}
