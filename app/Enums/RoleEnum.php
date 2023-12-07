<?php

namespace App\Enums;

enum RoleEnum:string {
    case ADMIN = 'ADMIN';
    case USER = 'USER';
    case OPT = 'OPT';
}