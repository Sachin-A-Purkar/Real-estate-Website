<?php
include 'head.php';
pg_query("delete from tblproperty where pid=".$_GET['id']);
?>
<script type="text/javascript">
	window.location.href="viewproperty.php";
</script>