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
    protected $primaryKey = "material_id";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'material_id',
        'course_id',
        'material_title',
        'material_desc'
    ];

    public function Course() {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function MaterialFile() {
        return $this->hasMany(MaterialFile::class, 'material_id', 'material_id');
    }
}
