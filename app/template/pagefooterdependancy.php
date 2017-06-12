<?php
//////////////////////// include in login page //////////////////////////////
if($currentpage == 'login')
{
	// <!-- validate login -->
	echo "<script type='text/javascript' src='".$js."validation.min.js'></script>";
	include $js .'validatelogin.js.php' ;
	//<!-- /validate login -->
}
//////////////////////// include in people page //////////////////////////////
if($currentpage == 'people' && $do =='manage')
{     
	//<!-- DataTables JavaScript -->
	echo "<script type='text/javascript' src='".$layoutplugins."datatables/media/js/jquery.dataTables.min.js'></script>";
	echo "<script type='text/javascript' src='".$layoutplugins."datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js'></script>";
	
	//<!-- Page-Level Demo Scripts - Tables - Use for reference -->
	echo "<script>
    $(document).ready(function() {
        $('#dataTables-people').DataTable({
                'language': {
                'url': '{$layoutplugins}datatables/ar.lang'
            },
			responsive: true
			
        });
    });
    </script>";
}

if($currentpage == 'people' && $do == 'add')
{ 
	// <!-- validate login -->
	echo "<script type='text/javascript' src='".$js."validation.min.js'></script>";
	include $js .'validateaddpeople.js.php' ;
	//<!-- /validate login -->
}
?>