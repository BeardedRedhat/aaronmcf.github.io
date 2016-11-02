/**
 * Created by AaronMcf on 24/10/2016.
 */
$(function() {
    var box = $('.box');
    var button = $('.box button');
    button.on('click', function(){
        box.toggleClass('active');
        if(box.hasClass('active'))
            button.text('Make this smaller!');
        else
            button.text('Make this bigger!');
    });
});