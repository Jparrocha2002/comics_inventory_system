<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class comics extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'category',
        'published',
        'available',
        'status'
    ];
}