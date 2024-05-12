<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "students";
    protected $primaryKey = "student_id";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'student_id',
        'student_username',
        'student_password',
        'student_name',
        'student_email',
        'student_address',
        'student_phone',
    ];

    public function Courses() {
        return $this->belongsToMany(Course::class, 'courses_taken', 'student_id', 'course_id');
    }

    public function Assignment() {
        return $this->belongsToMany(Assignment::class, 'finished_assignments', 'student_id', 'assignment_id');
    }
}
