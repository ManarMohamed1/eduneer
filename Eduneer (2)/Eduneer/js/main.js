/*global $, window, document*/
$(document).ready(function(){
   'use strict';
    //adjust header height
	var myHeader = $('.overlay');
    myHeader.height($(window).height());
    $(window).resize(function(){
        myHeader.height($(window).height());
    });


    $('#form').submit(function (e) {
        if($('input#password').val() !== $('input#confirm-password').val()) {
            e.preventDefault();
            $('span.confirm-password-error').slideDown();
        }

        if ($('input#first-name').val() = '') {
            e.preventDefault();
            $('span.first-name-error').slideDown();
        }

        if ($('input#last-name').val() = '') {
            e.preventDefault();
            $('span.last-name-error').slideDown();
        }

        if ($('input#email').val() = '') {
            e.preventDefault();
            $('span.email-error').slideDown();
        }
    });
});