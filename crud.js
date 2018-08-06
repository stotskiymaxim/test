$(document).ready(function(){
    var height = $(document).outerHeight(true);
    $(".block-left").css("height",height);
    $("#s").hide();
});



        $(document).ready(function(){
            $('#c').click(function(){

            var header = $("#header").val();
            var body = $("#bod").val();
            var status = $(".block-right").find('input.active').attr("name");

        //document.getElementById('message').innerHTML = "Пожалуйста, заполните все поля формы!";
        $.ajax({
            url: "savetask.php",
            type: "POST",
            data: {
                header: header,
                body: body,
                status: status
            },
            success: function(data){
                $("#content").load("showtask.php");
            },
            error: function() {

            }
        });
        }
        );
});






$(document).ready(function(){
    $('#btn1, #btn2, #btn3').click(function() {
        $(".block-right").find(':button').removeClass();
        $(".block-right").find(':button').css("background-color", "");
        $(this).addClass("active");
        $(".block-right").find(':button:not(.active)').removeClass();
        $(this).css("background-color", "#4CAF50");
        }
    );
});

$(document).ready(function(){
$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
});

$(document).ready(function(){
    $('#s').click(function(){
            var header = $("#header").val();
            var body = $("#bod").val();
            var status = $(".block-right").find('input.active').attr("name");
            $(".block-right").find('input.active').css("background-color", "");
            $(".block-right").find('input.active').removeClass("active");
            $("#header").val("");
            $("#bod").val("");
            //document.getElementById('message').innerHTML = "Пожалуйста, заполните все поля формы!";
            $.ajax({
                url: "updatetask.php",
                type: "POST",
                data: {
                    header: header,
                    body: body,
                    id: ids,
                    status: status
                },
                success: function(data){
                    $("#s").hide();
                    $(".block-right h2").text("Создать задачу");
                    $("#c").show();
                    $("#content").load("showtask.php");

                },
                error: function() {

                }
            });
        }
    );
});

$(document).ready(function(){
    $('#login').click(function(){
        var login = $("#username").val();
        var password = $("#pass").val();
            $.ajax({
                url: "verification.php",
                type: "POST",
                data: {
                    login: login,
                    password: password

                },
                success: function(data){
                    if(data == 1){
                        window.location.replace("Tasks.php");
                    }
                    else {
                        alert(data)
                    }
                },
                error: function() {

                }
            });
        }
    );
});

$(document).ready(function(){
    $('#reg').click(function(){
            var login = $("#username_r").val();
            var password = $("#pass_r").val();
            var email = $("#email").val();
            $.ajax({
                url: "registration.php",
                type: "POST",
                data: {
                    login: login,
                    password: password,
                    email: email
                },
                success: function(data){
                    if(data == 1){
                        window.location.replace("index.php");
                    }
                    else {
                        alert(data)
                    }
                },
                error: function() {

                }
            });
        }
    );
});

$(document).ready(function() {
    $('#email').blur(function() {
        if($(this).val() != '') {
            var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
            if(pattern.test($(this).val())){
                $(this).css({'border' : '1px solid #569b44'});
                $('#valid').text('Верно');
            } else {
                $(this).css({'border' : '1px solid #ff0000'});
                $('#valid').text('Не верно');
            }
        } else {
            $(this).css({'border' : '1px solid #ff0000'});
            $('#valid').text('Поле email не должно быть пустым');
        }
    });
});



