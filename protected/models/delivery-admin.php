<?php
class DeliveryModel {
	public function getDeliveriesAdmin($brandName, $table, $connect){
	
		$db = new db_config();

		$data = '';	
				
		$sql = "SELECT * FROM ".$table." WHERE brand_name = '". $brandName ."' ORDER BY delivery_id DESC";
		$result = mysqli_query($connect, $sql);
		//$num = $db->numrows($sql);
		
		
		
		$counter = 1;
		while ($row = mysqli_fetch_array($result)) {

			$delivery_id = $row['delivery_id'];
			$status = $row['delivery_status'];
			$brand_name = $row['brand_name'];
			$date_created = $row['date_created'];
			$details = $row['details'];
			$item_code = $row['item_code'];
			$unit_price = $row['unit_price'];
			$quantity = $row['quantity'];
			$sales_tax_amount = $row['sales_tax_amount'];
			$total_price = $row['total_price'];
			$date_accepted = $row['date_accepted'];
			
			$data .= "<tr>";
			$data .= "<td>" . $delivery_id . "</td>";			
			$data .= "<td>" . $brand_name . "</td>";
//			$data .= "<td>" . $brand_name . "</td>";
			$data .= "<td>" . $status . "</td>";
  			$data .= "<td>" . $quantity . "</td>";
//			$data .= "<td>" . $item_code . "</td>";
			$data .= "<td>" .  $quantity . "</td>";
//			$data .= "<td>" . $quantity . "</td>";
			$data .= "<td>" .  $date_accepted . "</td>";
			$data .= "<td>" . $details . "</td>";
			$data .= "<td>
							<a href='pdf/sample.pdf' target='blank' class='btn btn-sm btn-warning' type='button'><i class='fa fa-eye'></i>View</a>
							<a href='#' class='editBtn btn btn-sm btn-danger' type='button'><i class='fa fa-pencil'></i>Edit</a>		
					 </td>";
			$data .= "</tr>";
    	}
		
		return $data;
	
	}
}?>