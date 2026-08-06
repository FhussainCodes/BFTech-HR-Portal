<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Register;
class Leave extends Model
{
    protected $fillable = ['employee_id','leave_type','from_date','to_date','reason','status'];

        public function employee()
    {
        return $this->belongsTo(Register::class, 'employee_id');
    }


}
