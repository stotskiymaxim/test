$(document).ready(function(){
    var height = $(document).outerHeight(true);
    $(".block-left").css("height",height);
});


var ids=null;

        $(document).ready(function(){
            $('#form1').submit(function(){

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
            },
            error: function() {

            }
        });
        }
        );
});



$( document ).ready(function() {
    $("[id=del]").click(
        function(){
            var del = $(this).attr("name");
// Ваш скрипт
            if(confirm("Удалить эту запись?")){
            //document.getElementById('message').innerHTML = "Пожалуйста, заполните все поля формы!";
            $.ajax({
                url: "deletetask.php",
                type: "GET",
                data: {del: del},
                success: function(data){
                    $("#content").load("showtask.php");

                    //document.getElementById('content').inhnerHTML = $("#content");
                    //location.reload();
                    //alert(data);
                },
                error: function() {
                    alert("error");
                }
            });
            }
            else {

            }
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
                    $("#content").load("showtask.php");
                },
                error: function() {

                }
            });
        }
    );
});

$(document).ready(function(){
    $('#login-form').submit(function(){
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

$( document ).ready(function() {
    $("[id=upd]").click(
        function(){

            var user = $(this).parent(".blok").find(".user").html();
            var time = $(this).parent(".blok").find(".data").html();
            var status = $(this).parent(".blok").find(".btn").attr("id");
            var id = $(this).attr("name");
            var idbtn = "#btn"+status;
            $(".block-right :button").removeClass();
            $(".block-right :button").css("background-color", "");
            $(idbtn).addClass("active");
            $(idbtn).css("background-color", "#4CAF50");

            $("#header").val($(this).parent(".blok").find("#head").html());

            $("#bod").val($(this).parent(".blok").find("#body").html());
            $(".block-right h2").text("Редактирование задачи");
            $("#Submit").val("Обновить");
            ids = id;


        }
    );
});


function del(){
    document.getElementById('dictionary').querySelectorAll('tr').forEach(function(e) {
        e.onclick = function() {
            var id = this.cells[0].innerHTML;
            $.ajax({
                url: "delete.php",
                type: "GET",
                data: { // данные, которые будут отправлены на сервер
                    id: id
                },
                success: function(data){
                    if(serc==true){
                        $('#myForm').submit();
                    }else{
                        $("#dictionary").load("main.php #dictionary");
                    }
                },
                error: function(){
                    alert("Error");
                }
            });
            return false;
        }
    });
}
