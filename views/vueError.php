<?php

require 'Template.php'; 

echo 
"<table width='80%%' cellspacing='0' cellpadding='0' align='center'>
    <tr>
        <td class='texteAccueil'>"
            .$errors->afficherErreurs().
        "</td>
    </tr>
</table>";

?>