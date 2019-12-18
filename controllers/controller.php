<?php

function home()
{
	//$url="https://api.rawg.io/api/developers?search=Annapurna%20Interactive&page_size=1";
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
function error()
{
	require ('view/viewError.php');
}

