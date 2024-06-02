<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "materials";
    protected $primaryKey = "MATERIAL_ID";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'COURSE_ID',
        'MATERIAL_TITLE',
        'MATERIAL_DESC'
    ];

    public function Course() {
        return $this->belongsTo(Course::class, 'COURSE_ID', 'COURSE_ID');
    }

    public function MaterialFile() {
        return $this->hasMany(MaterialFile::class, 'MATERIAL_ID', 'MATERIAL_ID');
    }
}
