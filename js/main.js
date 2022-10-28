//FOR AUTHORIZATION
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


let avatar=false;
$('.avatar').change(function (event){
   avatar=event.target.files[0];
});
//FOR REGISTRATION
$('.sign-up').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        full_name = $('input[name="full_name"]').val(),
        email = $('input[name="email"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('pass', password);
    formData.append('password_confirm', password_confirm);
    formData.append('full_name', full_name);
    formData.append('email', email);
    formData.append('avatar', avatar);


    $.ajax({
        url: 'includes/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '/index.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);

            }

        }
    });

});