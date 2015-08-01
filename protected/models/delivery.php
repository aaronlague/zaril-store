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

			$counter++;

			$delivery_id = $row['delivery_report_id'];

			$status = $row['delivery_status'];

			$brand_name = $row['brand_name'];

			$date_created = $row['date_created'];

			$details = $row['details'];

			$item_code = $row['item_code'];

			$unit_price = $row['unit_price'];

			$quantity = $row['quantity'];

			$sales_tax_amount = $row['sales_tax_amount'];

			$total_price = $row['total_price'];

			$quantity = $row['quantity'];

			$delivery_col_status = str_replace(' ', '-', trim(strtolower($status)));

			$data .= "<tr>";

			$data .= "<td><input id='submitReport' name='submitReport' type='submit' value='submit' class='btn btn-primary' data-report-id='". $delivery_id ."' data-report-status='".$delivery_col_status."' style='float: right;  margin-right: 73px; width: 141px;'>" . $delivery_id . "</td>";			

			$data .= "<td class='status ".$delivery_col_status."'>" . $status . "</td>";

//			$data .= "<td>" . $brand_name . "</td>";

			$data .= "<td>" . $date_created . "</td>";

  			$data .= "<td class='details'>" . $details . "</td>";

  			$data .= "<td>" . $quantity . "</td>";

//			$data .= "<td>" . $item_code . "</td>";

			$data .= "<td class='unit_price'>" . $unit_price . "</td>";
			

			$data .= "<td>" . $sales_tax_amount . "</td>";

			$data .= "<td>" . $total_price . "</td>";

			$data .= "<td><a href='#' class='viewBtn btn btn-sm btn-warning' type='button'><i class='fa fa-eye'></i>View</a>";
//<a href='#' class='btn btn-sm btn-danger' type='button'><i class='fa fa-file'></i>Submit</a></td>			
//<a href='#' class='editBtn btn btn-sm btn-danger' type='button'><i class='fa fa-pencil'></i>Edit</a>
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