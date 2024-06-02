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
    protected $primaryKey = "TEACHER_ID";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'TEACHER_ID',
        'TEACHER_USERNAME',
        'TEACHER_PASSWORD',
        'TEACHER_NAME',
        'TEACHER_EMAIL',
        'TEACHER_ADDRESS',
        'TEACHER_PHONE',
    ];

    public function Course() {
        return $this->hasMany(Course::class, 'TEACHER_ID', 'TEACHER_ID');
    }
}
