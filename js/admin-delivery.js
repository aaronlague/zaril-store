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
                	$.ajax({
				    	  url: '../ajax/load-brands.php?brand_name=' + brand_name,
						  method: "POST",
						  success: function(data){
						  	var showResult = $('#deliveryList').load('../ajax/load-brands.php?brand_name='+brand_name+'' );
						  	return showResult;
						  	console.log('load brands');

					  	}
	                });
                }

                autoLoadDeliveryList();

                $('select.form-control').change(function(){

                	autoLoadDeliveryList();

            	});

			$('.editBtn').on( 'click', function () {
                $('#editModal').modal('show');
            } );


			var d = new Date();
			var n = d.getMonth();
			var month = n + 1 ;
			var time = d.getHours() + ":" + d.getMinutes() + " " + month + "/" + d.getDate() + "/" + d.getFullYear();
			//document.getElementById("currentTimeDate").innerHTML = time;

			$('#currentTimeDate').attr('placeholder' , time);
            
	       var initButtons = function(){
                    $('.print-report').click(function(){
                        alert('xxx');
                        var deliveryReportId = $(this).attr('data-report-id');
                        //location.href = '/tcpdf/reports/user-delivery-report.php?report_id='+deliveryReportId+'';
                        window.open('/tcpdf/reports/admin-delivery-report.php?report_id='+deliveryReportId+'', '_blank');
                    })
                };
                
                setTimeout(initButtons, 1000);

});