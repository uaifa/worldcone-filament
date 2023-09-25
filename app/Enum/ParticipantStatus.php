<?php

namespace App\Enum;

use App\Models\User;

class ParticipantStatus extends Enum
{
  /** @var int  "Incomplete" the participant has some required firds that have nlot been set.*/
  public const Incomplete   = 1;

  /** @var int  "Outstanding" a specified  payment amount shoulld be requested before the participant ids set to "Incomplete" or "Active" */
  public const Outstanding  = 2;

  /** @var int "Suspended", "Cancelled" or "Deceased" the user should not be able to update these participants */
  public const Suspended    = 3;
  /** @var int "Suspended", "Cancelled" or "Deceased" the user should not be able to update these participants */
  public const Cancelled    = 4;
  /** @var int "Suspended", "Cancelled" or "Deceased" the user should not be able to update these participants */
  public const Deceased     = 5;

  /** @var int successful purchases or upgrades should always be active. */
  public const Active       = 6;
}
