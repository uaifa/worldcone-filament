<?php

namespace App\Enum;

use App\Models\User;

class AttendingStatus extends Enum
{
  public const Not_attending = 1;
  public const In_person = 2;
  public const Virtual = 3;
  public const Programme = 4;
  public const Finalist = 5;
  public const Volunteers = 6;
}
