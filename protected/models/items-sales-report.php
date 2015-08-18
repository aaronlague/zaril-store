<?php
class ItemsSalesModel {
	public function getItemsSales($connect){
	
		$db = new db_config();

		$data = '';	
				
		$sql = "SELECT * FROM tbl_sales_trans ORDER BY transaction_date DESC";
		$result = mysqli_query($connect, $sql);
		//$num = $db->numrows($sql);
		
		
		
		$counter = 1;
		while ($row = mysqli_fetch_array($result)) {

			$sales_transaction_id = $row['sales_transaction_id'];
			$transaction_date = $row['transaction_date'];
			$item_code = $row['item_code'];
			$price = $row['price'];
			$sales_tax_amount = $row['sales_tax_amount'];	
			$total_sales_price = $row['total_sales_price'];

			$new_date = date("d/m/Y h:i:s", strtotime($transaction_date) );

			$data .= "<tr>";
			$data .= "<td class='userEmail'>" . $sales_transaction_id . "</td>";
			$data .= "<td class='userName'>" . $new_date . "</td>";
			$data .= "<td class='userBrandName'>" . $item_code . "</td>";
			$data .= "<td class='userRole'>" . $price . "</td>";
			$data .= "<td class='userRole'>" . $sales_tax_amount . "</td>";
			$data .= "<td class='userRole'>" . $total_sales_price . "</td>";
			$data .= "</tr>";
    	}
		
		return $data;
	
	}
}?>