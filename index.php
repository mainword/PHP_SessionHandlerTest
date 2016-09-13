<html>
<head></head>
<body>
<?php

if (ini_get('session.save_handler') != 'user') {
    ini_set('session.save_handler', 'user');
}

if (ini_get('session.serialize_handler') != 'php_serialize') {
    ini_set('session.serialize_handler', 'php_serialize');
}

function open() {
  echo "open <br/>";
}

function close() {
  echo "close <br/>";
}

function read($id) {
  echo "read: $id <br/>";
  return "";
}

function write($id, $data) {
  echo "write: $id | $data <br/>";
  return true;
}

function destroy($id) {
  echo "destroy: $id <br/>";
}

function gc($max) {
  echo "gc: $max <br/>";
}

session_set_save_handler('open','close', 'read','write', 'destroy','gc');
session_start();

$a = $_SESSION['key'];      //session reading test
$_SESSION['key'] = "value";   //session writing test

exit();

?>
</body>
</html>