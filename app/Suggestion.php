<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
	protected $guarded = ['g-recaptcha-response'];
}