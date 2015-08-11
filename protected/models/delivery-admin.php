<?php
class DeliveryModel {
	public function getDeliveriesAdmin($brandName, $status, $table, $connect){
	
		$db = new db_config();

		$data = '';	
		
		$sql .= "SELECT tbl_delivery_report.delivery_report_id, tbl_delivery_report.brand_name, tbl_delivery_report.delivery_status, tbl_delivery_report.quantity_received, tbl_delivery_report.date_accepted, SUM(tbl_deliveries.quantity) FROM tbl_deliveries INNER JOIN tbl_delivery_report ON tbl_deliveries.delivery_report_id = tbl_delivery_report.delivery_report_id WHERE tbl_delivery_report.brand_name = '".$brandName."' AND tbl_delivery_report.delivery_status = '".$status."' GROUP BY tbl_delivery_report.delivery_report_id";

		$result = mysqli_query($connect, $sql);
		
		$counter = 1;
		while ($row = mysqli_fetch_array($result)) {

			$delivery_id = $row['delivery_report_id'];
			$brand_name = $row['brand_name'];
			$status = $row['delivery_status'];
			$quantity_reported = $row['SUM(tbl_deliveries.quantity)'];
			$quantity_received = $row['quantity_received'];
			$date_accepted = $row['date_accepted'];
			
			$data .= "<tr>";
			$data .= "<td>" . $delivery_id . "</td>";			
			$data .= "<td>" . $brand_name . "</td>";
			$data .= "<td>" . $status . "</td>";
  			$data .= "<td>" . $quantity_reported . "</td>";
			$data .= "<td>" .  $quantity_received . "</td>";
			$data .= "<td>" .  $date_accepted . "</td>";
			$data .= "<td>
					<a href='javascript:void(0);' data-report-id='". $delivery_id ."' class='print-report btn btn-sm btn-warning' type='button'><i class='fa fa-eye'></i>View</a>
					<a href='javascript:void(0);' data-report-id='". $delivery_id ."' class='editBtn btn btn-sm btn-danger' type='button'><i class='fa fa-pencil'></i>Edit</a>		
			 </td>";
			$data .= "</tr>";
    	}
		
		return $data;
	
	}
}?>