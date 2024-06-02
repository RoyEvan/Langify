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
    protected $primaryKey = "STUDENT_ID";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'STUDENT_ID',
        'STUDENT_USERNAME',
        'STUDENT_PASSWORD',
        'STUDENT_NAME',
        'STUDENT_EMAIL',
        'STUDENT_ADDRESS',
        'STUDENT_PHONE',
    ];

    public function Courses() {
        return $this->belongsToMany(Course::class, 'courses_taken', 'STUDENT_ID', 'COURSE_ID');
    }

    public function Assignment() {
        return $this->belongsToMany(Assignment::class, 'finished_assignments', 'STUDENT_ID', 'ASSIGNMENT_ID');
    }
}
