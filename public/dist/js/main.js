var host = $("meta[name='home_url']").attr("content");
$(document).ready(function(){
	'use strict'

	$("#update-sitemap").click(function(){
		Swal.fire({
		  title: "Update Sitemap",
		  text: "This action will update sitemap instantly!",
		  icon: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#3085d6",
		  cancelButtonColor: "#d33",
		  confirmButtonText: "Yes, update it!"
		}).then((result) => {
		  if (result.isConfirmed) {
		  	Swal.fire({
	            html: '<br><br><br><br><img src="https://datamysite.com/public/loader.gif" height="50px"><br><br><br><br>',
	            showConfirmButton: false,
	            onRender: function() {
	                 // there will only ever be one sweet alert open.
	                 $('.swal2-content').prepend(sweet_loader);
	            }
	        });
		  	$.get(host+'/update-sitemap', function(){
		  		
		  	}).done(function() {
			    Swal.fire({
			      title: "Success!",
			      text: "Sitemap is updated.",
			      icon: "success"
			    });
			})
			.fail(function() {
			    Swal.fire({
			      title: "Alert!",
			      text: "Something went wrong. Please try again.",
			      icon: "warning"
			    });
			});
		  }
		});
	});

	$(document).on('submit', "#verifyForm", function(event) {
         $('#verifymodal').modal('hide');
		Swal.fire({
	        html: '<br><br><br><br><img src="https://datamysite.com/public/loader.gif" height="50px"><br><br><br><br>',
	        showConfirmButton: false,
	        onRender: function() {
	             // there will only ever be one sweet alert open.
	             $('.swal2-content').prepend(sweet_loader);
	        }
	    });

      var form = $(this);
      var formData = new FormData($("#verifyForm")[0]);
      //console.log(formData);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
        	Swal.fire({
		      title: "Success!",
		      text: data.message,
		      icon: "success"
		    });
          $('.close-btn').click();
          form.trigger("reset");
          setTimeout(function(){
            location.reload(true);
          }, 1000);
        } else {
        	Toast.fire({
            icon: 'error',
            title: data.message
          });
        }
      });

      event.preventDefault();
    });
});