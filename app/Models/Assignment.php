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
    protected $primaryKey = "assignment_id";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'assignment_id',
        'course_id',
        'assignment_title',
        'assignment_desc',
        'deadline'
    ];

    public function Course() {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function Student() {
        return $this->belongsToMany(Student::class, 'finished_assignments', 'assignment_id', 'assignment_id');
    }

    public function AssignmentFile() {
        return $this->hasMany(AssignmentFile::class, 'assignment_id', 'assignment_id');
    }
}
