    //Ajax login

    $(document).ready(function(){  
    $("#login").click(function(){  
    var username = $("#username").val();  
    var password = $("#password").val();
    var passhash = CryptoJS.MD5(password).toString();
    // Returns error message when submitted without req fields.  
    if(username==''||password=='')  
    {  
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Field login is empty!',
            showConfirmButton: true,
          })
    }  
    else  
    {  
    // AJAX Code To Submit Form.  
    $.ajax({  
    type: "POST",  
    url: $("base").attr("url") + 'auth/login_process',
    data: {username: username, password: passhash},  
    cache: false,  
    success: function(data){  
        if(data){  
            // On success redirect.  
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Login is Success!',
                showConfirmButton: false,
                timer: 1500
            }).then(function(){
                window.location = $("base").attr("url")+'resto'
            });
        }  else {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Login is Error!',
                showConfirmButton: false,
                timer: 1500
            });
        }

    }  
    });  
    }  
    
    });  
    });
    // Ajax end login

        //Ajax insert

        $(document).ready(function(){  
            $("#submit-insert-resto").click(function(){  
            var code_resto = $("#code_resto").val();  
            var name_resto = $("#name_resto").val();  
            var address_resto = $("#address_resto").val();  
            var city_resto = $("#city_resto").val();  
            var phone_resto = $("#phone_resto").val();  
            var user = $("#user").val();  

            // Returns error message when submitted without req fields.  
            if(code_resto==''||name_resto==''||address_resto==''||city_resto==''||phone_resto=='')  
            {  
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Field login is empty!',
                    showConfirmButton: false,
                    timer: 1500
                  })
            }  
            else  
            {  
            // AJAX Code To Submit Form.  
            $.ajax({  
            type: "POST",  
            url: $("base").attr("url") + 'resto/save',
            data: {
                code_resto: code_resto,
                name_resto: name_resto,
                address_resto: address_resto,
                city_resto: city_resto,
                phone_resto: phone_resto,
                user: user
            },  
            cache: false,  
            success: function(data){  
                // var dataResult = $.parseJSON(data);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data has been insert!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
                    window.location = $("base").attr("url")+'resto'
                });
        
            }  
            });  
            }  
            
            });  
            });
            // Ajax end insert

            //Ajax update

        $(document).ready(function(){  
            $("#submit-update-resto").click(function(){  
            var id = $("#id").val();  
            var code_resto = $("#code_resto").val();  
            var name_resto = $("#name_resto").val();  
            var address_resto = $("#address_resto").val();  
            var city_resto = $("#city_resto").val();  
            var phone_resto = $("#phone_resto").val();  
            var user = $("#user").val();  

            // Returns error message when submitted without req fields.  
            if(code_resto==''||name_resto==''||address_resto==''||city_resto==''||phone_resto=='')  
            {  
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Field login is empty!',
                    showConfirmButton: false,
                    timer: 1500
                  })
            }  
            else  
            {  
            // AJAX Code To Submit Form.  
            $.ajax({  
            type: "POST",  
            url: $("base").attr("url") + 'resto/save/'+id,  
            data: {
                code_resto: code_resto,
                name_resto: name_resto,
                address_resto: address_resto,
                city_resto: city_resto,
                phone_resto: phone_resto,
                user: user
            },  
            cache: false,  
            success: function(result){  
                if(result){  
                    // On success redirect.  
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data has been insert!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }  else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Data input is Error!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
        
            }  
            });  
            }  
            
            });  
            });
            // Ajax end update

            $('.delete-soon').click(function(){
                var id_row = this.id;
                Swal.fire({
                    title: 'Do you want to Delete this data?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Don't save`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire('Saved!', '', 'success').then(function(){
                            window.location.assign($("base").attr("url")+'resto/delete/'+id_row);
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Data not deleted', '', 'info')
                    }
                });
            });