<?php 
function FormataPreco($strDado)
{
	$valor = "";
	$valor = number_format($strDado, 2, ',', '');
    return $valor;
}
function FormataData($strDado)
{
	$valor = "";
	$date = date_create($strDado);
	$valor = date_format($date, 'd/m/Y H:i:s');
    return $valor;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vector - CRUD produtos</title>
<link rel="stylesheet" href="/files/skin.css" type="text/css" media="all" />
<script src="/files/scripts.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <h1>CRUD produtos</h1>
    </div>
    <div class="container">
        <div class="menu">
        	<p><a href="index.php" >HOME</a> | <a href="controle.php" >Controle de produtos</a></p>
        </div>
        <div class="block">