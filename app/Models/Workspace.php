<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'workspace_users');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function roles()
    {
        
    }
}
