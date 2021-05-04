<?php
  session_start();//inisi

  session_unset();

  session_destroy();//destruccion de sesion
  header('Location: /Dentista');//redireccionar a dentista
?>
