<?php
function mostraAlerta($tipo)
{
       session_start();
    if (isset($_SESSION[$tipo])) {
        ?>
<p class="alert-<?= $tipo?>"><?=$_SESSION[$tipo]?></p>

<?php
  unset($_SESSION[$tipo]);
    }
}
