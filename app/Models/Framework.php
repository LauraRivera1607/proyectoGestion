<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Framework extends Model
{
    protected $fillable = ['name'];

    public function processes()
    {
        return $this->hasMany(Process::class);
    }
}
