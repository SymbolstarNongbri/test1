<?php
    session_start();
    session_destroy();
    echo "<center><font color='red'> Logging you out ...</font></center>";
    header('Refresh: 2; URL = adm_login.php');
?>

<html>
<body bgcolor="pink" text="black">

</body>
</html>