<?php

namespace App\Enum;

class ProductFlag extends Enum
{
  /** @var int Hidden - Should not show on front end and not be used for validation - Basically it's FALSE */
  public const Hidden = 1;

  /** @var int Optional - Should be shown on front end, but not be used for validation - Basically it's TRUE */
  public const Optional = 2;

  /** @var int Required - Should be shown on front end, and must be used for validation - Basically it's VERY TRUE */
  public const Required = 3;
}
