<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "assignments";
    protected $primaryKey = "ASSIGNMENT_ID";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'COURSE_ID',
        'ASSIGNMENT_TITLE',
        'ASSIGNMENT_DESC',
        'DEADLINE'
    ];

    public function Course() {
        return $this->belongsTo(Course::class, 'COURSE_ID', 'COURSE_ID');
    }

    public function Student() {
        return $this->belongsToMany(Student::class, 'finished_assignments', 'ASSIGNMENT_ID', 'STUDENT_ID')
            ->withPivot("SCORE");
    }

    public function AssignmentFile() {
        return $this->hasMany(AssignmentFile::class, 'ASSIGNMENT_ID', 'ASSIGNMENT_ID');
    }
}
