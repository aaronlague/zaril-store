//$sales_tax = ($tax_percentage / 100) * $price;

//$total_price = ($price * $quantity) + $sales_tax;

//echo "<br />" . $sales_tax . "<br />";
//echo "<br />" . $total_price . "<br />";

//	$data['id'] = '1';
	// $data['delivery_id'] = rand() . date("Ymd");
	// $data['brand_name'] = $brand_name;
	// $data['delivery_status'] = 'pending';
	// $data['date_created'] = date("Y-m-d H:i:s");
	// $data['details'] = $_POST['product_details'];
	// $data['item_code'] = 'test';
	// $data['unit_price'] = $_POST['unit_price']; 
	// $data['quantity'] = $_POST['quantity'];
	// $data['sales_tax_amount'] = '100'; //$sales_tax; 
	// $data['total_price'] = '100'; //total_price; 
	
	//$db->mquery_insert("tbl_deliveries", $data, $connect);



	<!--<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Delivery ID</th>
								<th>Status</th>
								<th>Date Sent</th>
								<th>Details of Product</th>
								<th>Total Unit Price</th>
								<th>Total Sales Tax</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>DID1001</td>
								<td>Pending</td>
								<td>11:56PM 7/14/2015</td>
								<td>Women Sandals</td>
								<td>P100.00</td>
								<td>P30.00</td>
								<td>P130.00</td>
								<td>
									<a href="../pdf/sample.pdf" target="blank" class="btn btn-sm btn-warning" type="button"><i class="fa fa-eye"></i>View</a>
									<a href="#" class="editBtn btn btn-sm btn-danger" type="button"><i class="fa fa-pencil"></i>Edit</a>
									<a href="#" class="btn btn-sm btn-danger" type="button"><i class="fa fa-file"></i>Submit</a>																
								</td>
							</tr>
							<tr>
								<td>DID1002</td>
								<td>Pending</td>
								<td>11:56PM 7/14/2015</td>
								<td>Women Sandals</td>
								<td>P120.00</td>
								<td>P36.00</td>
								<td>P156.00</td>
								<td>
									<a href="../pdf/sample.pdf" target="blank" class="btn btn-sm btn-warning" type="button"><i class="fa fa-eye"></i>View</a>
									<a href="#" class="editBtn btn btn-sm btn-danger" type="button"><i class="fa fa-pencil"></i>Edit</a>
									<a href="#" class="btn btn-sm btn-danger" type="button"><i class="fa fa-file"></i>Submit</a>																
								</td>
							</tr>
							<tr>
								<td>DID1003</td>
								<td>Pending</td>
								<td>11:56PM 7/14/2015</td>
								<td>Women Sandals</td>
								<td>P120.00</td>
								<td>P36.00</td>
								<td>P156.00</td>
								<td>
									<a href="../pdf/sample.pdf" target="blank" class="btn btn-sm btn-warning" type="button"><i class="fa fa-eye"></i>View</a>
									<a href="#" class="editBtn btn btn-sm btn-danger" type="button"><i class="fa fa-pencil"></i>Edit</a>
									<a href="#" class="btn btn-sm btn-danger" type="button"><i class="fa fa-file"></i>Submit</a>																
								</td>
							</tr>							
						</tbody>
					</table>-->

$('#deliveryTable tbody:last').append('<tr><td><input type="text" placeholder="Auto ID" id="" class="form-control" disabled=""></td><td><input type="text" placeholder="" id="" class="form-control"></td><td><input type="text" placeholder="" id="" class="form-control"></td><td><i class="fa fa-remove remove"></i></i></td></tr>');                