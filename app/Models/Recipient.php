<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipient extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name' , 'email'];

    public function saveRecipient($request)
    {
        $obj = new self();
        $obj->name = $request->get('name');
        $obj->email = $request->get('email');
        $obj->save();
        return 1;
    }

    public function hasEmail($request)
    {
        return $this->whereEmail($request->get('email'))->count() > 0;
    }

}
