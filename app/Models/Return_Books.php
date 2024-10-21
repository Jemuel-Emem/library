<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Return_Books extends Model
{
    use HasFactory;


    protected $guarded = [];
    public function processedBorrowBook()
    {
        return $this->belongsTo(processed_borrowbooks::class, 'borrowbook_id');
    }
}
