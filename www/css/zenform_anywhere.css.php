<?php
$zenform = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/wdn/templates_3.0/css/content/zenform.css');
header('Content-type: text/css');
echo str_replace(array('#maincontent ', 'url(\'images/zenform/'), array('', 'url(\'/wdn/templates_3.0/css/content/images/zenform/'), $zenform);
?>

h3.zenform {
    color:#fff !important;
}
form.zenform input[type="submit"] {
    color:#fff !important;
}

form.zenform {
    width:640px;
}
