<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteWallet extends Model {
	use HasFactory;
	protected $table = 'site_wallet';
	protected $guarded = [];
}