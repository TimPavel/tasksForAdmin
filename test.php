<?php
echo '<pre>';
print_r($_SERVER);

echo '</pre>';

if ($_GET['action'] == 'input') {
    echo json_encode($_POST['ModelUser']);
} else {
    echo false;
}

//if ($_GET['action'] == 'adminCheck') {
//    echo 'if test';
//} else {
//    echo 'else test';
//}

echo($_POST['id'] + 1);

//if (isset($_POST['id'])) {
//    echo 'if  post';
//} else {
//    echo 'else  post';
//}

//echo json_encode($_POST['user']);