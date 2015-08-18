$(document).ready(function() {
	$.datepicker.regional[""].dateFormat = 'dd/mm/yy';
                $.datepicker.setDefaults($.datepicker.regional['']);
     $('#example').dataTable({
		"aoColumns": [ 
			{ "sWidth": "200px" },
			null,
			null
		]
	} )
		  .columnFilter({ sPlaceHolder: "head:before",
			aoColumns: [ { type: "text" },
				     { type: "date-range", sRangeFormat: "Between {from} and {to}"  },
                                     { type: "text" },
                                     { type: "text" },
                                     { type: "text" }
				]

		});
		  $(".filterColumn input, .filter_column input").addClass('form-control input-group');

	var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-17838786-4']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    $('.btn-print-report').click(function(){
    	//var deliveryReportId = $brand_name
    	//location.href = '/tcpdf/reports/user-delivery-report.php?report_id='+deliveryReportId+'';
    	window.open('/tcpdf/reports/admin-sales-report.php?' , '_blank');

    });

});