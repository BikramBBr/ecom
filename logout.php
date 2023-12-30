<?php

include_once('connection.php');

session_start();
session_unset();
session_destroy();

     ?>
                    <script>
                         
                          window.location.href='index.php';
                    </script>
            <?php

?>