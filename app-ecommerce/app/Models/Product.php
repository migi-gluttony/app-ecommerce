<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'detail', 
        'image',
        'price',
        'stock',
        'companyid',
    ];
    
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class, 'companyid');
    }
}