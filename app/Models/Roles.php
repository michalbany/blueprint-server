<?php

namespace App\Models;

enum Roles:string {
    case Editor = 'editor';
    case Viewer = 'viewer';
    case Admin = 'admin';
}