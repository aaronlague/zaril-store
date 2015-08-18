<?php
class TenantsSalesModel {
	public function getTenanstSales($connect){
	
		$db = new db_config();

		$data = '';	
				
		//$sql = "SELECT * FROM tbl_admin_sales_trans ORDER BY transaction_date DESC";
		$sql = "SELECT * FROM tbl_sales_trans ORDER BY transaction_date DESC";
		$result = mysqli_query($connect, $sql);
		//$num = $db->numrows($sql);
		
		
		
		$counter = 1;
		while ($row = mysqli_fetch_array($result)) {

			$brand_name = $row['brand_name'];			
			$sales_tax_amount = $row['sales_tax_amount'];	
			$total_sales_price = $row['total_sales_price'];


			$data .= "<tr>";
			$data .= "<td class='userEmail'>" . $brand_name . "</td>";
			$data .= "<td class='userName'>" . $sales_tax_amount . "</td>";
			$data .= "<td class='userBrandName'>" . $total_sales_price . "</td>";
			$data .= "</tr>";
    	}
		
		return $data;
	
	}
}?>