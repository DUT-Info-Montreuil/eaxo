
(function($){
    window.widgets_controller = {}
    window.widgets_controller.id = 0;
    window.widgets_controller.getNewID = function() {
        window.widgets_controller.id++

        return window.widgets_controller.id;
    }

})(jQuery);