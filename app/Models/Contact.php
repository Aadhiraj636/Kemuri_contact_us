<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
protected $fillable = [
    'name',
    'email',
    'message',
    'purpose',
    'issue_description',
    'contacting_from',
    'company_name'
];

}
