/**
 * Created by zeol on 04.04.16.
 */
$(function () {
    var common = {
        btn_edit_enabled: $('#status_change'),
        editEnabled: function (element) {
            //debugger;
            var self = $(element);

            var url = self.attr('data-href');
            var id  = self.attr('data-id');
            var status = self.attr('data-status');

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id: id,
                    status: status
                },
                success: function (response) {
                    if (!response.response) {
                        common.showErrorMessage();
                    } else {
                        location.reload();
                    }
                }
            });
        },
        showErrorMessage: function () {
            //noty({
            //    text: "Error, please try again later",
            //    layout: "topCenter",
            //    type: "alert",
            //    timeout: false,
            //    animation: {
            //        open: {height: 'toggle'},
            //        close: {height: 'toggle'},
            //        easing: 'swing',
            //        speed: 500 // opening & closing animation speed
            //    }
            //});
        },
        editEnabledHandler: function (event) {
            event.preventDefault();
            common.editEnabled(this);
        },
        initialize: function() {
            this.btn_edit_enabled.on('click', this.editEnabledHandler);
        }
    };

    common.initialize();
});

/*
From Krivoruchko
 $(function () {
 var common = {
 btn_edit_enabled: $('#status_change'),
 editEnabled: function (element) {
 //debugger;
 var self = $(element);
 var url = self.attr('href');
 var status = url.substr(-1) === '1' ? '0' : '1';
 $.ajax({
 type: 'post',
 url: url.substr(0, url.length -1) + status,
 success: function (response) {
 if (!response.response) {
 common.showErrorMessage();
 } else {
 location.reload();
 }
 }
 });
 },
 showErrorMessage: function () {
 //noty({
 //    text: "Error, please try again later",
 //    layout: "topCenter",
 //    type: "alert",
 //    timeout: false,
 //    animation: {
 //        open: {height: 'toggle'},
 //        close: {height: 'toggle'},
 //        easing: 'swing',
 //        speed: 500 // opening & closing animation speed
 //    }
 //});
 },
 editEnabledHandler: function (event) {
 event.preventDefault();
 common.editEnabled(this);
 },
 initialize: function() {
 this.btn_edit_enabled.on('click', this.editEnabledHandler);
 }
 };

 common.initialize();
 });



 */