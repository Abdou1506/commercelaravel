<?php

function format_devise($price)
{
 
   return number_format($price,2,',',' ') .'  € ';
}
?>