<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Task extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['title', 'description', 'long_description'];
    public function taskcomplete()
    {
        $this->completed = !$this->completed;
        $this->save();
    }
    //can use guarded specifying what not to use
}
