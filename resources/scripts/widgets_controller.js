import * as txt from './utils/textcontroller.js'
import * as cp from './shortcuts.js'


class WidgetController {
    constructor() {
        this.id = 0;
        this.selectedElement = null;
        this.exoIDList = []
        let self = this;
        
        $("#pageContainer").on("click", function(handler) {
            var target = handler.target;
            if(self.canEditNode(target)) {
                self.enableEdit(target)
                self.setSelectedElement(target)
            }
        });
    }

    //Next step : find better function to generate new unique id
    getNewID(element) {
        return new Date().getUTCMilliseconds() + "" + Date.now() + parseInt(Math.random() * 1000);
    }

    setSelectedElement(element) {
        if(this.selectedElement != null) {
            $(this.selectedElement).css("background-color","none");
        }

        this.selectedElement = element;
        
        
    }

    getSelectedElement() {
        return this.selectedElement;
    }

    getNextExoID() {

    }

    canEditNode(node) {
        if(node.id != "pageContainer" && !this.getSelectedElement()) {
            let array = ["h", "p"]
            for(var n in array) {
                if(node.tagName.toLowerCase().includes(array[n]) && node.tagName != "PAGE") {
                    return true
                }
                
            }
        }

        return false
    }

    enableEdit(node) {
        txt.enableEdit(this, node)
    }

    unselect() {

    }
}

const widget_c = new WidgetController();
export default widget_c;
