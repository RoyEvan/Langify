<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentFile extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "assignment_files";
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'assignment_id',
        'assignment_file_path'
    ];

    public function Assignment() {
        return $this->belongsTo(Assignment::class, 'assignment_id', 'assignment_id');
    }
}
