<?php
session_start();
if($_SESSION['responseCode']=='0')
{
	echo 'Gracias por su compra';
	return;
}
echo 'Su Compra falló'
?>