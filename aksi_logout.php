<?php
  session_start();
  unset($_SESSION['nisn']);
  echo "<script>alert('Anda sudah logout!'); window.location = 'index.php'</script>";
?>