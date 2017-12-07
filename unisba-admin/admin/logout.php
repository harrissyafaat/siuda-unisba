<?php
  session_start();
  unset($_SESSION['username']);
  echo "<script>alert('Anda sudah logout!'); window.location = '../../'</script>";
?>