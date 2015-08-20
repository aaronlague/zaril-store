<?php
class SalesModel {
	public function getSales($connect){
	
		$db = new db_config();

		$data = '';	
				
		//$sql = "SELECT * FROM tbl_sales_trans_report WHERE brand_name = '". $brandName ."' ORDER BY transaction_date DESC";
		$sql = "SELECT * FROM tbl_sales_trans_report ORDER BY transaction_date DESC";
		
		$result = mysqli_query($connect, $sql);
		//$num = $db->numrows($sql);
		
		
		
		$counter = 1;
		while ($row = mysqli_fetch_array($result)) {

			$sales_transaction_id = $row['sales_transaction_id'];
			$brand_name = $row['brand_name'];
			$subtotal = $row['subtotal'];	
			$sales_tax_total = $row['sales_tax_total'];
			$total_amount = $row['total_amount'];
			$transaction_date = $row['transaction_date'];
			

			$new_date = date("d/m/Y h:i:s", strtotime($transaction_date) );

			$data .= "<tr>";
			$data .= "<td class='userEmail'>" . $sales_transaction_id . "</td>";
			$data .= "<td class='userName'>" . $new_date . "</td>";
			$data .= "<td class='userRole'>" . $subtotal . "</td>";
			$data .= "<td class='userRole'>" . $sales_tax_total . "</td>";
			$data .= "<td class='userRole'>" . $total_amount . "</td>";
			$data .= "</tr>";
    	}
		
		return $data;
	
	}
}?>