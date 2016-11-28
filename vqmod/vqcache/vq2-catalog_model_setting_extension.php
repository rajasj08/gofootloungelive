<?php
class ModelSettingExtension extends Model {
	function getExtensions($type) {
		if (!isset($_SESSION["voucherproduct"]))
	 {
	 $_SESSION["voucherproduct"] = "false" ;
	 }
	
		if (($_SESSION["voucherproduct"] == "true") && 	($type=="payment") )

	{
	
	
	$query = $this->db->query("SELECT `value` FROM ".DB_PREFIX."setting WHERE `key` LIKE 'purchasevoucher_payment_methods'");
			
$arr = explode('|',$query->row['value']);

$message = 'AND `code` = ';

$count=0;
foreach($arr as $temp2) {
 
$count = $count + 1;
}


foreach($arr as $temp) {
$pcount = $count-1;
if ($pcount >= 1)
{

 if ($temp)
    {
	 $message .= "'".$temp."'".' ';
	$message .= 'OR `code` = ';	
	 
	}
	}
	else
	{
	$message .= "'".$temp."'".' ';
	}
	$count = $pcount;
	
}


	$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "extension WHERE `type` = 'payment' $message");
	}

	
	else {
	
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "extension WHERE `type` = '" . $this->db->escape($type) . "'");
}

		return $query->rows;
	}
}
?>