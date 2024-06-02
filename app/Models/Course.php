<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "courses";
    protected $primaryKey = "course_id";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'COURSE_ID',
        'TEACHER_ID',
        'COURSE_NAME',
        'COURSE_DESC',
        'COURSE_LEVEL',
        'COURSE_CLASS',
        'COURSE_DAY',
        'COURSE_LENGTH'
    ];

    public function Students() {
        return $this->belongsToMany(Student::class, 'courses_taken', 'COURSE_ID', 'STUDENT_ID');
    }

    public function Teacher() {
        return $this->belongsTo(Teacher::class, 'TEACHER_ID', 'TEACHER_ID');
    }

    public function Materials() {
        return $this->hasMany(Material::class, 'COURSE_ID', 'COURSE_ID');
    }

    public function Assignments() {
        return $this->hasMany(Assignment::class, 'COURSE_ID', 'COURSE_ID');
    }
}
