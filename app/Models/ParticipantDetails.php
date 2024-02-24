<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantDetails extends Model
{
    use HasFactory;

    // Relations between user details
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'phoneNumber',
        'gender',
        'group',
        'marital_status',
        'division',
        'district',
        'upazila',
        'thana',
    ];
}
