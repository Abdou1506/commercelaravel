<?php
 
function get_price($prix)
{
   $prix=floatval($prix) ;

   return number_format($prix,2,',',''). ' €';
}



?>