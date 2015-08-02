<?php
class DeliveryItemModel {
	public function getDeliveryItems($deliver_item_id, $connect){
	
		$db = new db_config();

		$data = '';	
				
		$sql = "SELECT * FROM tbl_deliveries WHERE delivery_id = '". $deliver_item_id ."'";
		$result = mysqli_query($connect, $sql);
		
		$counter = 1;
		while ($row = mysqli_fetch_array($result)) {

			$item_code = $row['item_code'];
			$unit_price = $row['unit_price'];
			$details = $row['details'];
			$quantity = $row['quantity'];

			$data .= "<td><input id='edit_item_code' class='form-control' type='text' value='".$item_code."'></td>";
			$data .= "<td><input id='edit_product_details' class='form-control' type='text' value='".$unit_price."'></td>";
			$data .= "<td><input id='edit_unit_price' class='form-control' type='text' value='".$details."'></td>";
			$data .= "<td><input id='edit_quantity' class='form-control' type='text' value='".$quantity."'></td>";

    	}
		
		return $data;
	
	}
}?>