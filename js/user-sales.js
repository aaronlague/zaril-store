$(document).ready(function() {

    $('.btn-print-report').click(function(){
    	//var deliveryReportId = $brand_name
    	var brand_name = $('.capitalize').text().replace(" ","");
    	//location.href = '/tcpdf/reports/user-delivery-report.php?report_id='+deliveryReportId+'';
    	brand_name  = brand_name.replace(/\s+/g,"");
      var date_from = $('#example_range_from_1').val().replace(/ |\//g,"-");
      var date_to = $('#example_range_to_1').val().replace(/ |\//g,"-");

    	window.open('/tcpdf/reports/user-sales-report.php?brand_name='+brand_name+'&dateFrom='+date_from+'&dateTo='+date_to+'' , '_blank');

    });

    $.datepicker.regional[""].dateFormat = 'dd/mm/yy';
                $.datepicker.setDefaults($.datepicker.regional['']);
     $('#example').dataTable({
        "aoColumns": [ 
            { "sWidth": "200px" },
            null,
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
                                     { type: "text" }
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