<?php

namespace App\Enum;

use App\Models\User;

class WSFSStatus extends Enum
{
  public const Vote_and_nominate = 1;
  public const Nominate = 2;
  public const None = 3;
  public const NASFiC = 4;
}
