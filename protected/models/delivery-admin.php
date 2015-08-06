<?php
class DeliveryModel {
	public function getDeliveriesAdmin($brandName, $table, $connect){
	
		$db = new db_config();

		$data = '';	
				
		//$sql = "SELECT * FROM ".$table." WHERE brand_name = '". $brandName ."' AND delivery_status = 'Pending' ORDER BY delivery_id DESC";
		//$sql = "SELECT * FROM tbl_delivery_report WHERE brand_name = '". $brandName ."' AND delivery_status = 'Pending'";
		
		$sql .= "SELECT tbl_delivery_report.delivery_report_id, tbl_delivery_report.brand_name, tbl_delivery_report.delivery_status ,SUM(tbl_deliveries.quantity) FROM tbl_deliveries INNER JOIN tbl_delivery_report ON tbl_deliveries.delivery_report_id = tbl_delivery_report.delivery_report_id WHERE tbl_delivery_report.brand_name = '".$brandName."' AND tbl_delivery_report.delivery_status = 'Pending' GROUP BY tbl_delivery_report.delivery_report_id";

		$result = mysqli_query($connect, $sql);
		
		$counter = 1;
		while ($row = mysqli_fetch_array($result)) {

			$delivery_id = $row['delivery_report_id'];
			$brand_name = $row['brand_name'];
			$status = $row['delivery_status'];
			$quantity_reported = $row['SUM(tbl_deliveries.quantity)'];
			
			/*$date_created = $row['date_created'];
			$details = $row['details'];
			$item_code = $row['item_code'];
			$unit_price = $row['unit_price'];
			$quantity = $row['quantity'];
			$sales_tax_amount = $row['sales_tax_amount'];
			$total_price = $row['total_price'];
			$date_accepted = $row['date_accepted'];*/
			
			$data .= "<tr>";
			$data .= "<td>" . $delivery_id . "</td>";			
			$data .= "<td>" . $brand_name . "</td>";
//			$data .= "<td>" . $brand_name . "</td>";
			$data .= "<td>" . $status . "</td>";
  			$data .= "<td>" . $quantity_reported . "</td>";
//			$data .= "<td>" . $item_code . "</td>";
			$data .= "<td>" .  $quantity . "</td>";
//			$data .= "<td>" . $quantity . "</td>";
			$data .= "<td>" .  $date_accepted . "</td>";
			//$data .= "<td>" . $details . "</td>";
			$data .= "<td>
							<a href='' data-report-id='". $delivery_id ."' class='print-report btn btn-sm btn-warning' type='button'><i class='fa fa-eye'></i>View</a>
							<a href='#' class='editBtn btn btn-sm btn-danger' type='button'><i class='fa fa-pencil'></i>Edit</a>		
					 </td>";
			$data .= "</tr>";
    	}
		
		return $data;
	
	}
}?>