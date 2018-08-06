

var ids = null;
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
            ids = id;
            $("#header").val($(this).parent(".blok").find("#head").html());

            $("#bod").val($(this).parent(".blok").find("#body").html());
            $(".block-right h2").text("Редактирование задачи");
            $("#s").show();
            $("#c").hide();


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