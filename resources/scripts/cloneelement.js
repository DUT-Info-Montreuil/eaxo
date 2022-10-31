import {createTextBox} from './elements/textbox.js'
import {createTrueOrFalse} from './elements/trueorfalse.js'
import widget_c from './widgets_controller.js'

function loadChildrenElements(clone) {
    //let attrs = clone[0].dataset.widget
    let attrs = clone[0].dataset.widget
    switch(attrs) {
        case "box":
            var inputArray = ["village", "villape", "ville", "village", "sillage", "loup", "loupe", "louve", "long", "loup"]
            for(var i  = 0; i < inputArray.length; i++) {
                createTextBox(clone, i, inputArray[i])
            }
            break;
        case "trueorfalse":
            for(var i = 0; i < 3; i++) {
                createTrueOrFalse(clone, i)
            }
            break;
    }

}

export function cloneElement(original, id) {
    
    var clone = original.clone();
    let array = clone[0].classList;


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

    clone.attr("id", "div" + widget_c.getID())
    clone.appendTo("#pageContainer");

   
    $(clone).draggable({
        containment:"#pageContainer"
    });

    loadChildrenElements(clone)
    
}
