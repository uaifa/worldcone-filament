<?php

namespace App\Enum;

use App\Models\User;

class ListingType extends Enum
{
  public const Not_Listed = 1;
  public const Preferred_Name = 2;
  public const Badge_Name = 3;
}
