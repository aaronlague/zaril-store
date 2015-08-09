$(document).ready(function() {

	$("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });

            var autoLoadDeliveryList = function(){
            	var brand_name = $('select.form-control').val();
                var status = $('select.status').val();
            	$.ajax({
			    	  url: '../ajax/load-brands.php?brand_name=' + brand_name + '&status=' + status,
					  method: "POST",
					  success: function(data){
					  	var showResult = $('#deliveryList').load('../ajax/load-brands.php?brand_name='+brand_name+'&status='+status+'' );
					  	return showResult;
				  	}
                });
            }

            var getDeliveryItemID = function(){
                var delivery_report_id = $(this).attr('data-report-id');
                $.ajax({
                      url: '../ajax/load.php?delivery_report_id=' + delivery_report_id,
                      method: "POST",
                      success: function(data){
                        var showResult = delivery_report_id;
                        alert(showResult);
                        return showResult;
                    }
                });
            }

            autoLoadDeliveryList();

            $('select.form-control').change(function(){

            	autoLoadDeliveryList();

        	});

			var d = new Date();
			var n = d.getMonth();
			var month = n + 1 ;
			var time = d.getHours() + ":" + d.getMinutes() + " " + month + "/" + d.getDate() + "/" + d.getFullYear();

			$('#currentTimeDate').attr('placeholder' , time);

            $('#deliveryList').on('click', '.print-report', function(){
                var deliveryReportId = $(this).attr('data-report-id');
                var status = $('select.status').val();
                window.open('/tcpdf/reports/admin-delivery-report.php?report_id='+deliveryReportId+'&status='+status+'', '_blank');
            });

            $('#deliveryList').on('click', '.editBtn', function () {
                
                var report_id = $(this).attr('data-report-id');
                $('#delivery_report_id').attr('value', report_id);
                $('#editModal').modal('show');
            });

});