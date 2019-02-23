<?php
function validation($data = "")
{
  if($data == "")
  {
    header('location: error.php?city='.$_POST['city']);
  }
}