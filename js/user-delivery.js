$(document).ready(function() {



	$('#example1').dataTable({ "bLengthChange": false, "bPaginate": false }).rowGrouping({bExpandableGrouping: true});



	//$('#example1').dataTable({ "bLengthChange": false, "bPaginate": false, "dom": '<"toolbar">frtip'}).rowGrouping({bExpandableGrouping: true});

	//$("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');



    $('#example2').dataTable({

        "bPaginate": true,

        "bLengthChange": false,

        "bFilter": false,

        "bSort": true,

        "bInfo": true,

        "bAutoWidth": false

    });



    $('.addDelivery').on( 'click', function () {

    $('#createDeliveryModal').modal('show');

    var rowCount = $('#deliveryTable >tbody >tr').length;

    if (rowCount == 1) {

    	$('.removeRow').css('display','none');

    } else {

    	$('.removeRow').css('display','inline');

    }

    });



	$('.editBtn').on( 'click', function () {

        $('#edit_item_code').removeAttr('disabled');

        $('#edit_product_details').removeAttr('disabled');

        $('#edit_unit_price').removeAttr('disabled');

        $('#edit_quantity').removeAttr('disabled');

        $('#edit-btn-row').removeAttr('disabled');

    });



	 

	$( "#example1 tr .viewBtn" ).each(function(index) {

		$(this).on('click', function(){

		$('#viewEditDelieveryModal').modal('show');

		

		var delivery_item_id = $(this).attr('data-delivery-item-id');

		var details = $("#example1 tr td.details").html();

		var unit_price = $("#example1 tr td.unit_price").html();



		$.ajax({

		    		

			  url: '../ajax/load-item-details.php?deliveryItemId=' + delivery_item_id,

			  method: "POST",

			  success: function(){

			  	var showResult = $('#deliveryFields').load('../ajax/load-item-details.php?deliveryItemId='+delivery_item_id+'' );

				return showResult;

			  	console.log('show delivery item fields');



			  }



		});



		$('#viewEditDelieveryModal #edit_product_details').attr('placeholder' , details);

		$('#viewEditDelieveryModal #edit_unit_price').attr('placeholder' , unit_price);



		});   

	});



    $('.addRow').on( 'click', function () {



    	var details = $("#item_code").val();

    	//if ("detail.attr('aria-invalid') == 'true'") {

		   // $('#deliveryTable tbody:last').append('<tr><td><input type="text" placeholder="" name="item_code[]" id="item_code" class="form-control" minlength="2" required></td><td><input type="text" placeholder="" id="product_details" name="product_details[]" class="form-control" minlength="2" required></td><td><input type="text" placeholder="" id="unit_price" name="unit_price[]" class="form-control" minlength="1" required></td><td><input type="text" placeholder="" id="quantity" name="quantity[]" class="form-control" minlength="1" required></td></tr>');

        	//$('.removeRow').css('display','inline');

		//} else {

		    

		//} 



         $('#deliveryTable tbody:last').append('<tr><td><input type="text" placeholder="" name="item_code[]" id="item_code" class="form-control" minlength="2" required></td><td><input type="text" placeholder="" id="product_details" name="product_details[]" class="form-control" minlength="2" required></td><td><input type="text" placeholder="" id="unit_price" name="unit_price[]" class="form-control" minlength="1" required></td><td><input type="text" placeholder="" id="quantity" name="quantity[]" class="form-control" minlength="1" required></td></tr>');

         $('.removeRow').css('display','inline');



    } );

	

    $('.removeRow').on( 'click', function () {

    	

    	$('#deliveryTable tbody tr:last').remove();



    	var rowCount = $('#deliveryTable >tbody >tr').length;

        

        if (rowCount == 1) {

        	$('.removeRow').css('display','none');

        } else {

        	$('.removeRow').css('display','inline');

        }

    

    } );



	

    function ShowLocalDate()

    {

	    var dNow = new Date();

	    var localdate= (dNow.getMonth()+1) + '/' + dNow.getDate() + '/' + dNow.getFullYear() + ' ' + dNow.getHours() + ':' + dNow.getMinutes();

	    $('#currentDate').text(localdate)

    }

    



    $('.group input').click(function(){



    	var reportId = $(this).attr('data-report-id');



		$.confirm({



		    text: "Are you sure you want to submit this report?",

		    

		    confirm: function() {



		    	$.ajax({

		    		

		    	  url: '../ajax/submit-delivery.php?report-id=' + reportId,

				  method: "POST",

				  success: function(){

				  	

				  	$('#example1 tbody tr.group-item  td.status').attr('data-status', 'Pending');



				  	location.href = '/user/delivery.php?submit=true';

				  	console.log('delivery sbmitted');



				  }



				});

		    },

		    

		    cancel: function() {



		        location.href = '/user/delivery.php?submit=false';

		        console.log('delivery submitted');

		    }

		});

    



		event.stopPropagation();



	});





    $('input[data-report-status="pending"]').prop('disabled', true);

    $('input[data-report-status="accepted"]').prop('disabled', true);

    $('.viewBtn[data-report-status="pending"]').attr('disabled', true);

    $('.viewBtn[data-report-status="accepted"]').attr('disabled', true);


    $('.print-report').click(function(){

    	var deliveryReportId = $(this).attr('data-report-id');

    	//location.href = '/tcpdf/reports/user-delivery-report.php?report_id='+deliveryReportId+'';

    	window.open('/tcpdf/reports/user-delivery-report.php?report_id='+deliveryReportId+'', '_blank');

    });





    $("#createDelivery").validate({

	  rules: {

	    unit_price: {

	      required: true,

	      number: true

	    },

	    quantity: {

	      required: true,

	      number: true

	    }

	    

	  }

	});



});