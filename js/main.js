$('.sign-in').click(function (event){
    event.preventDefault();
    login=$('.login').val();
    password=$('.pass').val();
    console.log(password);
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
                $('.message').removeClass('hide').text(data.message);
            }

        }
    });
    console.log(login);
});