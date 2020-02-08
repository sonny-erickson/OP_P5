<?php

function home()
{
	require ('view/viewHome.php');
}
function top()
{
	require ('view/viewTop.php');
}
function news()
{
	require ('view/viewNews.php');
}
function mention()
{
	require ('view/viewMentionsLegales.php');
}
function jeuSolo()
{
	require ('view/jeuSolo.php');
}
function details()
{
	$platforms = [];
	$slug = $_GET['slug'];
		//todo:controller le slug et id existe
		$modelAdmin = new Model\ModelAdmin();
		$platforms = $modelAdmin->getPlatformsForGameAndMember($_GET['slug'],$_SESSION['id']);
		$platforms = json_encode($platforms);
		var_dump($platforms);
		require ('view/jeuSolo.php');
}
function error()
{
	require ('view/viewError.php');
}

