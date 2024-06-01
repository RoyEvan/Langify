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
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'course_id',
        'teacher_id',
        'course_name',
        'course_desc',
        'course_level',
        'course_class',
        'course_day',
        'course_length'
    ];

    public function Students() {
        return $this->belongsToMany(Student::class, 'courses_taken', 'course_id', 'student_id');
    }

    public function Teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'teacher_id');
    }

    public function Materials() {
        return $this->hasMany(Material::class, 'course_id', 'course_id');
    }

    public function Assignments() {
        return $this->hasMany(Assignment::class, 'course_id', 'course_id');
    }
}
