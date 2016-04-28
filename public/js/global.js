$(document).ready(function(){


    // $('.js-create-question').click(function(){
    //     $(this).parent().parent().append(
    //         '<section class="survey-section section-active animated fadeInRight">' +
    //             '<h3>Select Question Type</h3>' +
    //             '<div class="row">'+
    //             '<button type="button" class="btn q-multi">Multiple Choice</button>'+
    //             '</div><div class="row">'+
    //             '<button type="button" class="btn q-radio">One Choice</button>'+
    //             '</div><div class="row">'+
    //             '<button type="button" class="btn q-open">Open Ended</button>'+
    //             '</div><div class="row">'+
    //             '<button type="button" class="btn js-btn-right">Go Back</button>'+
    //             '</div>'+
    //         '</section>'
    //     );
    // });

    $('.js-create-question').click(function(){
        $(this).parent().parent().append(
           '<section class="survey-section section-active animated fadeInRight">'+
               '<label>Enter your question'+
               '<input type="text">'+
               '</label>'+
               '<div class="row">'+
                   '<button type="button" class="btn btn-center js-btn-left">Go Back</button>'+
                   '<button type="button" class="btn btn-center js-create-question">Add Question</button>'+
                   '<button type="submit" class="btn btn-center ">Complete Survey</button>'+
                '</div>'+
           '</section>'
        );
    });

    $('.q-multi').click(function(){
        alert($(this).attr('class'));
    });


    $('.js-btn-left').click(function(){
        console.log("work");
        $(this).parent().removeClass('animated fadeInRight');
        $(this).parent().addClass('animated fadeOutRight');
        $(this).parent().prev().addClass('animated fadeInLeft section-active');
        $(this).parent().removeClass('section-active animated fadeOutRight');
    });


    $('.js-btn-right').click(function(){
        $(this).parent().removeClass('animated fadeInLeft');
        $(this).parent().addClass('animated fadeOutLeft');
        $(this).parent().next().addClass('animated fadeInRight section-active');
        $(this).parent().removeClass('section-active animated fadeOutLeft');
    });

});
