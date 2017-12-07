<?php
  session_start();
  unset($_SESSION['nim']);
  echo "<script>alert('Anda sudah logout!'); window.location = 'daftar.php'</script>";
?>