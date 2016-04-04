/**
 * Created by zeol on 04.04.16.
 */
$(function () {
    var mainSlider = {
        btn_edit_enabled: $('.edit-enabled'),
        editEnabled: function (element) {
            var self = $(element);
            $.ajax({
                type: 'post',
                url: self.attr('href'),
                data: {
                    enabled: self.attr('enabled'),
                    id:  self.attr('id')
                },
                success: function (responce) {
                    if (!responce.responce) {
                        mainSlider.showErrorMessage();
                    } else {
                        location.reload();
                    }
                }
            });
        },
        showErrorMessage: function () {
            noty({
                text: "Error, please try again later",
                layout: "topCenter",
                type: "alert",
                timeout: false,
                animation: {
                    open: {height: 'toggle'},
                    close: {height: 'toggle'},
                    easing: 'swing',
                    speed: 500 // opening & closing animation speed
                }
            });
        },
        editEnabledHandler: function (event) {
            event.preventDefault();
            mainSlider.editEnabled(this);
        },
        initialize: function() {
            this.btn_edit_enabled.on('click', this.editEnabledHandler);
        }
    };

    mainSlider.initialize();
});