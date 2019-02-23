<?php
function validation ($data)
{
  if($data == "")
  {
    header('location: index.php?error="Please Enter A Valid City"');
  }
}