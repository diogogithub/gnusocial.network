<?php
	$nodos = array("https://loadaverage.org", "https://gnusocial.cc", "https://gnusocial.no", "https://gnusocial.net", "https://quitter.im", "https://fossforward.com");
	$n = array_rand($nodos, 1);
	$url = $nodos[$n];
	header('Location: '.$url);
	exit();
?>
