<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentLogs extends Model
{
    use HasFactory;

    protected $table = 'rent_logs';

    protected $fillable = [
        'user_id',
        'category_id',
        'rent_date',
        'return_date',
        'peminjam',
    ];

    protected $attributes = [
        'peminjam' => 1,
        'status' => ' '
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
