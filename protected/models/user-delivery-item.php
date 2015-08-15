<?php

class DeliveryItemModel {

	public function getDeliveryItems($deliver_item_id, $connect){

	

		$db = new db_config();



		$data = '';	

				

		$sql = "SELECT * FROM tbl_deliveries WHERE delivery_id = '". $deliver_item_id ."'";

		$result = mysqli_query($connect, $sql);

		

		$counter = 1;

		while ($row = mysqli_fetch_array($result)) {



			$delivery_item_id = $row['delivery_id'];

			$item_code = $row['item_code'];

			$unit_price = $row['unit_price'];

			$details = $row['details'];

			$quantity = $row['quantity'];



			$data .= "<td style='display:none;'><input id='edit_delivery_item_id' name='edit_delivery_item_id' class='form-control' type='hidden' value='".$delivery_item_id."'></td>";

			$data .= "<td><input id='edit_item_code' name='edit_item_code' class='form-control item-code' type='text' value='".$item_code."' minlength='2' required='' disabled></td>";

			$data .= "<td><input id='edit_product_details' name='edit_product_details' class='form-control' type='text' value='".$details."' minlength='2' required='' disabled></td>";

			$data .= "<td><input id='edit_unit_price' name='edit_unit_price' class='form-control' type='text' value='".$unit_price."' minlength='1' required='' disabled></td>";

			$data .= "<td><input id='edit_quantity' name='edit_quantity' class='form-control' type='text' value='".$quantity."' minlength='1' required='' disabled></td>";
		}

		return $data;
	}

	public function getDeliveryItemsDelete($deliver_item_id, $connect){

	

		$db = new db_config();



		$data = '';	

				

		$sql = "SELECT * FROM tbl_deliveries WHERE delivery_id = '". $deliver_item_id ."'";

		$result = mysqli_query($connect, $sql);

		

		$counter = 1;

		while ($row = mysqli_fetch_array($result)) {



			$delivery_item_id = $row['delivery_id'];

			$item_code = $row['item_code'];

			$unit_price = $row['unit_price'];

			$details = $row['details'];

			$quantity = $row['quantity'];



			$data .= "<td style='display:none;'><input id='edit_delivery_item_id' name='edit_delivery_item_id' class='form-control' type='hidden' value='".$delivery_item_id."'></td>";

			$data .= "<td style='width:25%'>".$item_code."</td>";

			$data .= "<td style='width:25%'>".$details."</td>";

			$data .= "<td style='width:25%'>".$unit_price."</td>";

			$data .= "<td style='width:25%'>".$quantity."</td>";
		}

		return $data;
	}
	public function getDeliveryDeliveryDelete($delivery_report_id, $connect){

	

		$db = new db_config();



		$data = '';	

				

		$sql = "SELECT * FROM tbl_deliveries WHERE delivery_report_id = '". $delivery_report_id ."'";

		$result = mysqli_query($connect, $sql);

		

		$counter = 1;

		while ($row = mysqli_fetch_array($result)) {


			$delivery_report_id = $row['delivery_report_id'];

			$delivery_item_id = $row['delivery_id'];

			$item_code = $row['item_code'];

			$unit_price = $row['unit_price'];

			$details = $row['details'];

			$quantity = $row['quantity'];


			$data .= "<tr>";

			$data .= "<td style='display:none;'><input id='edit_delivery_item_id' name='delete_delivery_item_id' class='form-control' type='hidden' value='".$delivery_report_id."'></td>";

			$data .= "<td style='width:25%'>".$item_code."</td>";

			$data .= "<td style='width:25%'>".$details."</td>";

			$data .= "<td style='width:25%'>".$unit_price."</td>";

			$data .= "<td style='width:25%'>".$quantity."</td>";
			
			$data .= "</tr>";


		}

		return $data;
	}
}?>

