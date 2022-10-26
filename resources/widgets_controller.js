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
