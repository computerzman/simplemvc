<?php
//echo $currentpage;
//////////////////////// include in login page //////////////////////////////
if($currentpage == 'login')
{
	// <!-- DataTables CSS -->
	echo "<script type='text/javascript' src='".$js."validation.min.js'></script>";
	include $js .'validatelogin.js.php' ;
	//<!-- DataTables CSS -->
}
//////////////////////// include in people page //////////////////////////////
if($currentpage == 'people' && $do =='manage')
{
	//<!-- DataTables css -->
	echo "<link href='".$layoutplugins."datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css'  rel='stylesheet'>";
//	<!-- DataTables Responsive CSS -->
	
	echo "<link href='".$layoutplugins."datatables-responsive/css/responsive.bootstrap.css'  rel='stylesheet'>";
	//	<!-- My Custom DataTables  CSS -->
	
	echo "<link href='".$layoutplugins."datatables/media/css/dataTables.mohamedcustom.css'  rel='stylesheet'>";
		
}
?>
