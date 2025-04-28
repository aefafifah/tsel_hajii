<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetInsentif extends Model
{
    use HasFactory;

    protected $table = 'budget_insentif';
    protected $fillable = ['total_insentif'];

    public function histories()
    {
        return $this->hasMany(BudgetHistory::class, 'budget_insentif_id');
    }
}
