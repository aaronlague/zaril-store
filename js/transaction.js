function addRowToDatatable(){
	var itemTable = $("#transactionTable").dataTable({
		//"oLanguage": {"sZeroRecords": "", "sEmptyTable": ""}
			"bRetrieve": true,
	  		"bServerSide": true,
	  		"aoColumnDefs": [
		      { "sClass": "sum", "aTargets": [ 0 ] }
		    ],
		    "fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {

	            var iPrice = 0;
	            for ( var i=iStart ; i<iEnd ; i++ )
	            {
	                iPrice += aaData[ aiDisplay[i] ][3]*1;
	            }

	            var iSalesTax = 0;
	            for ( var i=iStart ; i<iEnd ; i++ )
	            {
	                iSalesTax += aaData[ aiDisplay[i] ][4]*1;
	            }

	            var iTotalPrice = 0;
	            for ( var i=iStart ; i<iEnd ; i++ )
	            {
	                iTotalPrice += aaData[ aiDisplay[i] ][5]*1;
	            }
	             
	            /* Modify the footer row to match what we want */
	            var nPriceCell = nRow.getElementsByTagName('th');
	            nPriceCell[1].innerHTML = parseInt(iPrice * 100)/100;

	            var nSalesTaxCell = nRow.getElementsByTagName('th');
	            nSalesTaxCell[2].innerHTML = parseInt(iSalesTax * 100)/100;

	            var nTotalPriceCell = nRow.getElementsByTagName('th');
	            nTotalPriceCell[3].innerHTML = parseInt(iTotalPrice * 100)/100;

	            var subTotalCol = $('th.price-col').text();
	            $('.sub-total input').val(subTotalCol);

	            var salesTaxCol = $('th.tax-col').text();
	            $('.sales-tax input').val(salesTaxCol);

	            var totalPriceCol = $('th.total-price-col').text();
	            $('.total-amount input').val(parseInt(subTotalCol) + parseInt(salesTaxCol));

	        }
	  	});

	var item_code = $('#item-code').val();

	$.ajax({

    	  url: '../ajax/load-item.php?item_code=' + item_code,
		  method: "POST",
		  success: function(data){
		  	
		  	var items = JSON.parse(data);
		  	var checkItemCode = items.length;
		  	
		  	

		  	if (items.length == '0') 	{
		  		console.log(checkItemCode);
		  		alert('No item code found');

		  	} else {

		  		itemTable.fnAddData(items);
		  		itemTable.fnDraw();
		  		sumTotalCol();

		  		//alert(items[0] + " " + items[1] +" "+ items[2] +" "+ items[3] +" "+ items[4] +" "+ items[5]);
		  		var itemRow = "<tr><td><input name='brand_name[]' type='hidden' value='"+items[0]+"'><input name='item_code[]' type='hidden' value='"+items[1]+"'><input name='description[]' type='hidden' value='"+items[2]+"'><input name='price[]' type='hidden' value='"+items[3]+"'><input name='sales_tax[]' type='hidden' value='"+items[4]+"'><input name='total[]' type='hidden' value='"+items[5]+"'></td></tr>";


		  		/*var itemRow = "<tr><td><input name='brand_name' type='hidden' value='"+items[0]+"'><input name='item_code' type='hidden' value='"+items[1]+"'><input name='description' type='hidden' value='"+items[2]+"'><input name='price' type='hidden' value='"+items[3]+"'><input name='sales_tax' type='hidden' value='"+items[4]+"'><input name='total' type='hidden' value='"+items[5]+"'></td></tr>";*/

		  		$(".items-row table").append(itemRow);
		  		
		  	}
	  	}

    });
}

function removeRowDatatable(){

	var itemTable = $("#transactionTable").DataTable({
			"bRetrieve": true,
	  		"bServerSide": true
	  	});

	$("#transactionTable tbody").on('click', '.btn-remove-item', function() {
        
		var rowIndex = $(this).closest("tr").get(0);
		itemTable.fnDeleteRow(itemTable.fnGetPosition(rowIndex));

    }); 

}

function sumTotalCol (){

	var sum = 0;
	$(".sum").each(function() {

	    var value = $(this).text();
	    // add only if the value is number
	    if(!isNaN(value) && value.length != 0) {
	        sum += parseInt(value);
	    }
	});

    $('th.subtotal').text(sum);
	
}

$(document).ready(function() {

    $("#transactionTable").DataTable(
	    {
	  		"aoColumnDefs": [
		      { "sClass": "sum", "aTargets": [5] }
		    ],

		    "fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {

	            var iPrice = 0;
	            for ( var i=iStart ; i<iEnd ; i++ )
	            {
	                iPrice += aaData[ aiDisplay[i] ][3]*1;
	            }

	            var iSalesTax = 0;
	            for ( var i=iStart ; i<iEnd ; i++ )
	            {
	                iSalesTax += aaData[ aiDisplay[i] ][4]*1;
	            }

	            var iTotalPrice = 0;
	            for ( var i=iStart ; i<iEnd ; i++ )
	            {
	                iTotalPrice += aaData[ aiDisplay[i] ][5]*1;
	            }
	             
	            /* Modify the footer row to match what we want */
	            var nPriceCell = nRow.getElementsByTagName('th');
	            nPriceCell[1].innerHTML = parseInt(iPrice * 100)/100;

	            var nSalesTaxCell = nRow.getElementsByTagName('th');
	            nSalesTaxCell[2].innerHTML = parseInt(iSalesTax * 100)/100;

	            var nTotalPriceCell = nRow.getElementsByTagName('th');
	            nTotalPriceCell[3].innerHTML = parseInt(iTotalPrice * 100)/100;

	            var subTotalCol = $('th.price-col').text();
	            $('.sub-total input').val(subTotalCol);

	            var salesTaxCol = $('th.tax-col').text();
	            $('.sales-tax input').val(salesTaxCol);

	            var totalPriceCol = $('th.total-price-col').text();
	            $('.total-amount input').val(parseInt(subTotalCol) + parseInt(salesTaxCol));
	        }
	    }
   	);

    $('#item-code').autocomplete({
      	source: function( request, response ) {
      		$.ajax({
      			url : '../ajax/load-item-codes.php',
      			dataType: "json",
				data: {
				   item_code: request.term
				   //type: 'item_code'
				},
				 success: function( data ) {
					 response( $.map( data, function( item ) {
						return {
							label: item,
							value: item
						}
					}));
				}
      		});
      	},
      	autoFocus: true,
      	minLength: 1      	
    });

    $('.btn-go-add').click(function(){

    	addRowToDatatable();
    	
    	$('#item-code').val('');
    });
   
    $('#item-code').on('keypress', function (event) {

    	if(event.which === 13){
        	addRowToDatatable();
        	$('.compute').trigger("click")
        	$('#item-code').val('');
    	}

    });

    removeRowDatatable();
    
    $('#amount_given').on('keyup', function(){
    	var change = $(this).val() - $('#total_amount').val();
    	$('#change_amount').val(change);
    })

});