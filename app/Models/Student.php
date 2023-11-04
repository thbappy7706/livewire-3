<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Student extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    protected $guarded = ['id'];


    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class);
    }
}
