<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['id']);
unset($_SESSION['lname']);
unset($_SESSION['fname']);
echo '<script>location.href="/"</script>';
?>