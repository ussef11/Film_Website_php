<?php 
include("cnx.php");
$sql1="select * from film where titre ='{$_REQUEST["ref"]}'";
$t=$conx->query($sql1);
$rod=$t->fetch(PDO::FETCH_ASSOC);
$video_url =$rod['lien'] ;
$video_data = file_get_contents($video_url);
$save_path = "/path/to/save/video.mp4";
file_put_contents($save_path, $video_data);
//header("location:movie-details?ref={$_REQUEST['ref']}");
?>