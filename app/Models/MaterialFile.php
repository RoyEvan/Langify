<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialFile extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "material_files";
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'material_id',
        'material_file_path'
    ];

    public function Material() {
        return $this->belongsTo(Material::class, 'material_id', 'material_id');
    }
}
