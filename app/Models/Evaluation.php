<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evaluation extends Model
{
    protected $fillable = [
        'user_id',
        'framework',
        'domain',
        'score_total',
        'nivel',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
