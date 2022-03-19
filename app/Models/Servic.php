<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servic extends Model
{
    use HasFactory;
    protected $table="servics";

    public function category(){
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }
}
