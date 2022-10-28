$('.sign-in').click(function (event){
    event.preventDefault();
    login=$('.login').val();
    password=$('.pass').val();
    $.ajax({
        url:'includes/signin.php',
        type: 'POST',
        dataType: 'text',
        data:{
            login:login,
            password: password
        },
        success (data){
            $('.message').removeClass('hide').text(data);
        }
    });
    console.log(login);
});