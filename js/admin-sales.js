$(document).ready(function() {
    $('.btn-print-report').click(function(){
    	//var deliveryReportId = $brand_name
    	//location.href = '/tcpdf/reports/user-delivery-report.php?report_id='+deliveryReportId+'';
    	var from = $("#example_range_from_1").val();
        var to = $("#example_range_to_1").val();
        window.open('/tcpdf/reports/admin-sales-report.php?from='+from+'&to='+to+'', '_blank');

    });

$.datepicker.regional[""].dateFormat = 'dd/mm/yy';
                $.datepicker.setDefaults($.datepicker.regional['']);
     $('#example').dataTable({
        "aoColumns": [ 
            { "sWidth": "200px" },
            null,
            null,
            null,
            null
        ]
    } )
          .columnFilter({ sPlaceHolder: "head:before",
            aoColumns: [ { type: "text" },
                     { type: "date-range" },
                                     { type: "text"  },
                                     { type: "text" },
                                     { type: "text" },
                ]

        });

          var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-17838786-4']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
});