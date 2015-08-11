$(document).ready(function() {

    $('.btn-print-report').click(function(){
    	//var deliveryReportId = $brand_name
    	var brand_name = $('.capitalize').text().replace(" ","");
    	//location.href = '/tcpdf/reports/user-delivery-report.php?report_id='+deliveryReportId+'';
    	brand_name  = brand_name.replace(/\s+/g,"");
    	window.open('/tcpdf/reports/user-sales-report.php?brand_name='+brand_name+'' , '_blank');

    });

});