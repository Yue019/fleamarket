<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class); // Purchase は Item に所属
    }
}
