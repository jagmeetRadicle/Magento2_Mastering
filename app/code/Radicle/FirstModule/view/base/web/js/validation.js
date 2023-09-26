define([
    'jquery',
    'jquery/validate',
    'mage/translate'
],function ($) {
    'use strict';

    return function () {
        console.log("hello1");
        // Add a validation method that checks if the name is greater than 3 characters.
        $.validator.addMethod(
            'custom-min-length',
            function(name){
                console.log("Length is : "+ name);

                return  name.length > 3;
            },
            $.mage.__('Length should be greater than 3')
        )
    }
})
