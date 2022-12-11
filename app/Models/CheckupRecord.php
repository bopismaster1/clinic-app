<?php

namespace App\Models;

use App\Models\Doctors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckupRecord extends Model
{
    use HasFactory;

    /**
     * Get the Doctor that owns the CheckupRecord
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Doctor()
    {
        return $this->belongsTo(Doctors::class, 'doctor_id', "id");
    }
}
