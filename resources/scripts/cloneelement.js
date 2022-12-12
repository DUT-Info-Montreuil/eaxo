
import widget_c from './widgets_controller.js'
import widgetElementLoader from './widget_element_loader.js';

function loadChildrenElements(clone) {
    //let attrs = clone[0].dataset.widget
    let widgetType = clone[0].dataset.widget
    let elementType = clone[0].dataset.eaxoelement;
    let isPreview = clone.hasClass("elementPreview")

    if(widgetType) {
        if (widgetElementLoader.loadExercice(widgetType)) {
            widgetElementLoader.loadExercice(widgetType)(clone);
        }
    }
    else if (elementType) {
        if(widgetElementLoader.loadElement(elementType)) {
            widgetElementLoader.loadElement(elementType)(clone, isPreview)
        }
    }
    

}

export function cloneElement(original, id) {
    
    let clone = original.clone();
    let array = clone[0].classList;

    //Forbid clone
    clone.removeClass("eaxoClonable");
    
    for(var i = 0; i < array.length; i++) {
        
        if(array[i] != "eaxoDraggable") {
            clone.removeClass(array[i])
        }

        if(array[i] =="eaxoResizable") {
            $("#pageTest" + id).resizable({
                containment:"#pageContainer"
            });
        }

    }
    /*clone.resizable({
        containment:"#pageContainer"
    });*/

    clone.on("drag", function() {
        clone.position({
            collision:"fit"
        })
    
    })
    
    clone.attr("id", widget_c.getNewID(clone[0]))
    clone.appendTo("#pageContainer");


   
    $(clone).draggable({
        containment:"#pageContainer",
        
    });

    loadChildrenElements(clone)
    
}
