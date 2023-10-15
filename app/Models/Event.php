<?php

namespace App\Models;

use App\Events\EventCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

/**
* The attributes that are mass assignable.
*
* @var array<int, string>
     */
    protected $fillable = [
        'name',
        'theme',
        'user_id',
        'description',
        'location',
        'dateOfEvent',
    ];

    protected $dispatchesEvents = [
        'created' => EventCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function getDateOfEventAttribute($date)
    {
        if ($date)
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d M Y');
        else
            return null;
    }

}
