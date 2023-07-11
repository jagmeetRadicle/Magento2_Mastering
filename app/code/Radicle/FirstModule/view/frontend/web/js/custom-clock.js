define([
    'jquery',
    'uiComponent',
    'ko'
    ],function($,Component,ko){
    return Component.extend({
        clock : ko.observable(''),
        defaults:{
            template : "Radicle_FirstModule/custom-clock"
        },
       initialize : function(){
           this._super();
           setInterval(this.reloadTime.bind(this),1000);
       },

       reloadTime : function(){
           /* Setting new time to our clock variable. DOM manipulation will happen automatically */
           this.clock(Date());
       },

       getClock : function(){
           return this.clock;
        }

    });
});
