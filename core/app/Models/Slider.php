<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sliders';

    protected $fillable = [

        'id',
        'name',
        'image',
        'status',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        // Creating event
        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });

        // Updating event
        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });

        // Deleting event
        static::deleting(function ($model) {
            $model->deleted_by = Auth::id();
            $model->save(); // Ensure to save the updated deleted_by value
        });
    }
}
