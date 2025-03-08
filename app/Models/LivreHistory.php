<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivreHistory extends Model
{
    use HasFactory;

    protected $fillable = ['livre_id', 'changes', 'action', 'user_id'];

    protected $casts = [
        'changes' => 'array',
    ];

    /**
     * Get the book associated with this history entry.
     */

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    /**
     * Get the user who made the change.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
