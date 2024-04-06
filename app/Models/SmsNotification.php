<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsNotification extends Model
{
    use HasFactory;
    protected $table = 'sms_notification';
    protected $fillable = ['admin_name', 'message'];
}
