<?php
    session_start();
    session_destroy();
    echo "<center><font color='red'> Logging you out ...</font></center>";
    header('Refresh: 5; URL = ../home.php');
?>

<html>
<body bgcolor="pink" text="black">

</body>
</html>