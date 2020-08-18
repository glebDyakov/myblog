<?php
setcookie("login","",time()-3600*30*24,"/");
unset($_COOKIE["login"]);
echo true;


