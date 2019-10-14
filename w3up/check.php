<?php
error_reporting(E_ALL);

if(ini_get('file_uploads') == 1)
  {
    print 'HTTP Upload Enabled';
  }
  else
    {
      print 'HTTP Upload Disabled';
    }
?>
