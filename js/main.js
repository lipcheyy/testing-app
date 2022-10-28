$('.sign-in').click(function (event){
    event.preventDefault();
    $(`input`).removeClass('error');
    login=$('.login').val();
    password=$('.pass').val();

    $.ajax({
        url:'includes/signin.php',
        type: 'POST',
        dataType: 'json',
        data:{
            login:login,
            pass: password
        },
        success (data){
            if(data.status===true){
                document.location.href="homepage.php"
            }
            else {
                if (data.type===1){
                    data.fields.forEach(function (errors){
                        $(`input[name="${errors}"]`).addClass('error');
                    });
                }
                $('.message').removeClass('hide').text(data.message);
            }

        }
    });
    console.log(login);
});