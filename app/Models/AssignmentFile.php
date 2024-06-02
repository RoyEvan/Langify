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
        'ASSIGNMENT_ID',
        'ASSIGNMENT_FILE_PATH'
    ];

    public function Assignment() {
        return $this->belongsTo(Assignment::class, 'ASSIGNMENT_ID', 'ASSIGNMENT_ID');
    }
}
