<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'slug',
        'image',
        'parent_id',
        'user_id',
        'description'
    ];

    public static function uploadFlie($request)
    {
        if (!$request->hasFile('image')) {
            return;
        }

        $file = $request->file('image');

        // create name for image 
        $originalName = $request->name;
        $extension = $file->getClientOriginalExtension();
        $timestamp = time();
        $nameFile = 'MA-STORE_' . $originalName . "_" . $timestamp . '.' . $extension;
        $directory = $request->parent_id === null ? 'categories' : 'sub-categories';

        $path = $file->storeAs("uploads/images/$directory", $nameFile, ['disk' => 'public']);
        return $path;
    }
}
