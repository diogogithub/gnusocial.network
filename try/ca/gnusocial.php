<?php
	$nodos = array("https://loadaverage.org", "https://gnusocial.cc", "https://gnusocial.no", "https://gnusocial.ch", "https://gnusocial.librelabucm.org", "https://quitter.im", "https://quitter.es");
	$n = array_rand($nodos, 1);
	$url = $nodos[$n];
	header('Location: '.$url);
	exit();
?>
