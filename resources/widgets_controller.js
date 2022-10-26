class WidgetController {
    constructor() {
        this.id = 0;
        this.selectedElement = null;
    }

    getID() {
        return this.id++;
    }

    setSelectedElement(element) {
        this.selectedElement = element;
    }

    getSelectedElement() {
        return this.selectedElement;
    }


}

const widget_c = new WidgetController();
export default widget_c;

/*(function($){
    window.widgets_controller = {}
    window.widgets_controller.id = 0;
    window.widgets_controller.getNewID = function() {
        window.widgets_controller.id++

        return window.widgets_controller.id;
    }

})(jQuery);*/