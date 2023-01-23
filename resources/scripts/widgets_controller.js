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

            var old = self.getSelectedElement()
        
            if(old && (old.dataset.widget || old.dataset.imageid || old.dataset.header)) {
                $(old).removeClass("eaxoSelectedBorder")
            }

            if(self.canEditNode(target)) {
                
                self.enableEdit(target)
                self.setSelectedElement(target)
            } else {
                self.canSetSelectedExercice(target);
            }
            
            
        });
    }
    
    unselect() {
        var old = this.getSelectedElement()
        
        if(old && old.dataset.widget) {
            $(old).removeClass("eaxoSelectedBorder")
        }
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

    canSetSelectedExercice(target) {
        let headerElement = target.dataset.header ? target : (target.offsetParent.dataset.header ? target.offsetParent : null)
        if(target.dataset.widget || target.nodeName == 'IMG' || headerElement) {
            let newTarget = headerElement ? headerElement : target;
            console.log(newTarget)
            if(target.nodeName == 'IMG') {
                newTarget = target.offsetParent
            }

            this.selectedElement = newTarget;
            $(newTarget).addClass("eaxoSelectedBorder");
        }
    }

    canEditNode(node) {
        if(node.id != "pageContainer") {
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

    cloneImage(img, id) {
        //Close image folder
        $("#exampleModal").modal('hide')
        

        var newImg = $(img).clone();

        var div = $("<div>");
        div[0].dataset.imageid = id;
        div.css("width", newImg.css("width"))
        div.css("height", newImg.css("height"))
        newImg.css({width: '', height:''})
        newImg.css("margin-left", '')
        newImg.css("border-radius", '')


        newImg.removeClass("vueImageApiImages")
        newImg.addClass("imageLoaded")
        newImg[0].dataset.nosave = true

        newImg.appendTo(div)
        div.appendTo("#pageContainer")
        div.draggable({
            containment:"#pageContainer"
        })
        div.resizable({
            containment:"#pageContainer"
        });
    }
}

const widget_c = new WidgetController();
export default widget_c;

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/