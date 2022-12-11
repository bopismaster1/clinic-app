<?php

namespace App\Models;

use App\Models\CheckupRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctors extends Model
{
    use HasFactory;

    /**
     * Get all of the CheckupRecord for the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function CheckupRecord()
    {
        return $this->hasMany(CheckupRecord::class);
    }
}
