$(document).ready(function() {

    $('.btn-print-report').click(function(){
    	//var deliveryReportId = $(this).attr('data-report-id');

    	//location.href = '/tcpdf/reports/user-delivery-report.php?report_id='+deliveryReportId+'';

    	window.open('/tcpdf/reports/tenant-sales-report.php', '_blank');

    });

});