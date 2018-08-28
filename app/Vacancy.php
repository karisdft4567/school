<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = ['title','description','email_id','contact_no','status'];
}
?>