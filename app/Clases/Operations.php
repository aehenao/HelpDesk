<?php

namespace App\Clases;

class Operations
{

  public function AddHours($date, $hoursAdd){
    $date->modify("+{$hoursAdd} hour");
    $date->format('Y-m-d H:i:s');

    return $date;
  }


}


 ?>
