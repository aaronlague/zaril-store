<?php
	class TransactionItemsModel {

		public function getTransactionItems($item_code, $connect){

		$db = new db_config();

		$data = '';	
		/*$sql = "SELECT tbl_delivery_report.delivery_report_id, tbl_deliveries.delivery_id, tbl_deliveries.brand_name, tbl_deliveries.item_code, tbl_deliveries.details, tbl_deliveries.unit_price, tbl_deliveries.sales_tax_amount, tbl_deliveries.total_price, tbl_delivery_report.quantity_received FROM tbl_deliveries INNER JOIN tbl_delivery_report ON tbl_deliveries.delivery_report_id = tbl_delivery_report.delivery_report_id WHERE tbl_delivery_report.delivery_status = 'Accepted'";*/
		$sql = "SELECT tbl_delivery_report.delivery_report_id, tbl_deliveries.delivery_id, tbl_deliveries.brand_name, tbl_deliveries.item_code, tbl_deliveries.details, tbl_deliveries.unit_price, tbl_deliveries.sales_tax_amount, tbl_deliveries.total_price, tbl_delivery_report.quantity_received FROM tbl_deliveries INNER JOIN tbl_delivery_report ON tbl_deliveries.delivery_report_id = tbl_delivery_report.delivery_report_id WHERE tbl_delivery_report.delivery_status = 'Accepted' AND tbl_deliveries.item_code = '".$item_code."'";
		$result = mysqli_query($connect, $sql);

		$counter = 1;

		$data = array();

		while ($row = mysqli_fetch_array($result)) {
		
			//$delivery_report_id = $row['delivery_report_id'];
			//$delivery_id = $row['delivery_id'];
			$brand_name = $row['brand_name'];
			$item_code = $row['item_code'];
			$details = $row['details'];
			$unit_price = $row['unit_price'];
			$sales_tax_amount = $row['sales_tax_amount'];
			$total_price = $row['total_price'];
			//$quantity_received = $row['quantity_received'];
			$action_btn = "<button class='btn btn-primary btn-remove-item' data-dismiss='modal' type='button'>Remove</button>";
			/*$data .= "<tr>";
			$data .= "<td>" .$brand_name. "</td>";
			$data .= "<td>" .$item_code. "</td>";
			$data .= "<td>" .$details. "</td>";
			$data .= "<td>" .$unit_price. "</td>";
			$data .= "<td>" .$sales_tax_amount. "</td>";
			$data .= "<td>" .$total_price. "</td>";
			$data .= "<td class='text-center'><a href='#'><i class='fa fa-remove remove'></i></a></td>";
			$data .= "</tr>";*/


			array_push($data, $brand_name, $item_code, $details, $unit_price, $sales_tax_amount, $total_price, $action_btn);



		}

		echo json_encode($data);
		//return $data;

	}

}?>