var host = $("meta[name='home_url']").attr("content");

$(document).ready(function(){

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });


    $(document).on("submit", "#sell-enquiry-form", function (event) {

        $(".loading").css({display:"block"});
        var form = $(this);
        var formData = new FormData($("#sell-enquiry-form")[0]);

        let isValid = true;
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Email validation
        let email = $(".sell-email").val().trim();
        if (email === "" || !emailPattern.test(email)) {
            Toast.fire({
                icon: "warning",
                title: "Please Enter valid Email address",
            });
            isValid = false;
        } else {
            isValid = true;
        }

        if (isValid) {
            $.ajax({
                type: "POST",
                url: form.attr("action"),
                data: formData,
                dataType: "json",
                encode: true,
                processData: false,
                contentType: false,
            })
            .done(function (data) {
                if (data.success == "success") {
                    Toast.fire({
                        icon: "success",
                        title: data.message,
                    });

                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else {
                    Toast.fire({
                        icon: "warning",
                        title: data.message,
                    });
                }
                $(".loading").css({display:"none"});
            })
            .fail(function (e) {
                $(".loading").css({display:"none"});
                Toast.fire({
                    icon: "warning",
                    title: 'Something went wrong! Try again later.',
                });
            });
        }
        event.preventDefault();
    });


    $(document).on('click', '.sellPropertyBtn', function(){

        $('#sellPropertyModal').modal('show');
    });


    $('#searchfield').keyup(function(){
        var val = $(this).val();
        if (val.length !== 0) {
          
          $.get(host+"/blog/search/"+val, function(data, status){
            if(data == 'not-found'){
              $('.header-search-tray').html('');
            }else{
              $('.header-search-tray').html(data);
            }
          });
        }else{
            $('.header-search-tray').html('');
        }
    });
});
