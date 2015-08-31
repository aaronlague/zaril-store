$(document).ready(function() {
	function checkUserRole() {
    		var isadmin = $('#isAdmin').val();
				console.log(isadmin);
				if(isadmin == 0){
					alert(isadmin);
					$("#isAdmin").attr('checked', checked);
					$('#isAdmin').addClass("tets");
				}	
				else{
					$("#isAdmin").attr('checked', checked);
				}	
	}  


	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
			$('.modal').close();
		}
	});
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });


            $('.addUser').on( 'click', function () {
                $('#UserModal').modal('show');
            } );

			

$( "#example1 tr .editBtn" ).each(function(index) {

		$(this).on('click', function(){

		$('#editUserModal').modal('show');

		var user_id = $(this).attr('data-id');

		console.log(user_id);

			$.ajax({

				  url: '../ajax/load-user.php?userid=' + user_id,

				  method: "POST",

				  success: function(){

				  	var showResult = $('#userFields').load('../ajax/load-user.php?userid=' + user_id +'' );			  
					return showResult;

				  	console.log('show delivery item fields');
				  }
			});

		}); 

	});


	$("#createUser").validate();
	$("#editUser").validate();
	
	$('#isAdmin').click(function(){

		$(this).attr('value', this.checked ? 1 : 0)

	});

	$( "#example1 tr .resetBtn" ).each(function(index) {

		$(this).on('click', function(){

			var user_id = $(this).attr('data-id');

			$.confirm({

				text: "Are you sure you want to reset password?",
		    	
		    	confirm: function() {
			    	$.ajax({

			    	  url: '../ajax/reset-user.php?userid=' + user_id,
					  method: "POST",
					  success: function(){
					  	alert('password reset success');
					  }

					});

			    },

			    cancel: function() {

			        //location.href = '/user/delivery.php?submit=false';
			        

			    }

			});

		});

	});

});