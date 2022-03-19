<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $table="service_categories";
    
    public function servics()
    {
        return $this->hasMany(Servic::class);
    }
}
