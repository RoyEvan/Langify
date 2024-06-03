<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Authenticatable
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


    protected $appends = ["globalusername", "globalname", "globalemail", "globalrole"];

    public function getGlobalusernameAttribute()
    {
        return $this->TEACHER_USERNAME;
    }
    public function getGlobalnameAttribute()
    {
        return $this->TEACHER_NAME;
    }
    public function getGlobalemailAttribute()
    {
        return $this->TEACHER_EMAIL;
    }
    public function getGlobalroleAttribute()
    {
        return "teacher";
    }

    public function Course()
    {
        return $this->hasMany(Course::class, 'TEACHER_ID', 'TEACHER_ID');
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->TEACHER_PASSWORD;
    }
}
