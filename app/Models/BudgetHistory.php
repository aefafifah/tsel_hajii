<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetHistory extends Model
{
    use HasFactory;

    protected $table = 'budget_histories';

    protected $fillable = [
        'budget_insentif_id',
        'change_amount',
        'previous_budget',
        'current_budget',
        'action'
    ];

    public function budgetInsentif()
    {
        return $this->belongsTo(BudgetInsentif::class, 'budget_insentif_id');
    }
}
