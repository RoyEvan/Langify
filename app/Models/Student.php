<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
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

    protected $appends = ["globalusername", "globalname", "globalemail", "globalrole"];

    public function getGlobalusernameAttribute() {
        return $this->STUDENT_USERNAME;
    }
    public function getGlobalnameAttribute() {
        return $this->STUDENT_NAME;
    }
    public function getGlobalemailAttribute() {
        return $this->STUDENT_EMAIL;
    }
    public function getGlobalroleAttribute() {
        return "student";
    }

    public function Course()
    {
        return $this->belongsToMany(Course::class, 'courses_taken', 'STUDENT_ID', 'COURSE_ID');
    }

    public function Assignment()
    {
        return $this->belongsToMany(Assignment::class, 'finished_assignments', 'STUDENT_ID', 'ASSIGNMENT_ID');
    }



    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->STUDENT_PASSWORD;
    }
}
