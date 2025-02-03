<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetInsentif extends Model
{
    use HasFactory;

    protected $table = 'budget_insentif';
    protected $fillable = ['total_insentif'];
}
