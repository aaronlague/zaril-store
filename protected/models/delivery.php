<?php
class DeliveryModel {

	public function getDeliveries($brandName, $table, $connect){

		$db = new db_config();

		$data = '';	

		$sql = "SELECT * FROM ".$table." WHERE brand_name = '". $brandName ."' ORDER BY date_created DESC";

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

			

			$data .= "<tr>";

			$data .= "<td>" . $delivery_id . "</td>";			

			$data .= "<td>" . $status . "</td>";

//			$data .= "<td>" . $brand_name . "</td>";

			$data .= "<td>" . $date_created . "</td>";

  			$data .= "<td>" . $details . "</td>";

//			$data .= "<td>" . $item_code . "</td>";

			$data .= "<td>" . $unit_price . "</td>";

//			$data .= "<td>" . $quantity . "</td>";

			$data .= "<td>" . $sales_tax_amount . "</td>";

			$data .= "<td>" . $total_price . "</td>";

			$data .= "<td><a href='../pdf/sample.pdf' target='blank' class='btn btn-sm btn-warning' type='button'><i class='fa fa-eye'></i>View</a>

			<a href='#' class='editBtn btn btn-sm btn-danger' type='button'><i class='fa fa-pencil'></i>Edit</a>

			<a href='#' class='btn btn-sm btn-danger' type='button'><i class='fa fa-file'></i>Submit</a></td>";

			$data .= "</tr>";

    	}
      $data .= "<tfoot>";
      $data .= "<tr>";
        $data .= "<th></th>";
        $data .= "<th></th>";
        $data .= "<th></th>";
        $data .= "<th class='btn-success'>" . Total . "</th>";
        $data .= "<th class='btn-success'>" . total . "</th>";
        $data .= "<th class='btn-success'>" . total . "</th>";
        $data .= "<th class='btn-success'>" . total . "</th>";
        $data .= "<th></th>";
      $data .= "</tr>";
		  $data .= "</tfoot>";

		return $data;

	

	}

}?>