<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = ['name', 'framework_id'];

    public function framework()
    {
        return $this->belongsTo(Framework::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
