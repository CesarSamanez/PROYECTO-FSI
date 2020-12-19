<?php
    session_start();
    session_destroy();
    echo "<script>
        alert('Sesión finalizada');
        window.location = 'login.php';
        </script>
    ";
?>