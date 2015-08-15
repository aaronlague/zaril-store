/*$('.cancel').on( 'click', function () {
        $('tbody').remove();
    });


	$('#btnFinish').on( 'click', function () {
		var totalAmount = $("#totalAmount").html().replace(/total:|P|.00/gi, '');
		var amountGiven = $("#amountGiven").val();
		
		var t = parseFloat(totalAmount);
		var a = parseFloat(amountGiven)

		var change = a - t;
		
		$('#change').attr('value', change)

		console.log(change);
        if(a == ""){
			alert("Fill up");
		}else if(t <= a){
			
			alert("transaction successful!");
		}
		else{
			alert("Amount given is less than total amount");
		}
    });*/

$(document).ready(function() {
    $('#example').dataTable({	
		"sPaginationType": "full_numbers",
		"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?	i : 0;
				};
	 
				// total_salary over all pages
				total_salary = api.column( 1 ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				},0 );
				
				// total_page_salary over this page
				total_page_salary = api.column( 1, { page: 'current'} ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				}, 0 );
				
				total_page_salary = parseFloat(total_page_salary);
				total_salary = parseFloat(total_salary);
				// Update footer
				$('#totalSalary').html(total_page_salary.toFixed(2)+"/"+total_salary.toFixed(2));				
			},		
	});
});
