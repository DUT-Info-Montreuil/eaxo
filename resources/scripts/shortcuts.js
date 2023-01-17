
import exoParser from './exoParser.js'
import widget_c from './widgets_controller.js'

let ctrlPressed = false
let copyPressed = false
let pastePressed = false


$("body").keydown(function(event) {
    
    
    //Save
    if(event.ctrlKey && event.keyCode == 83) {
        event.preventDefault();
        exoParser.saveExo();
    }

    if(event.originalEvent.key == "Delete") {
        if(widget_c.getSelectedElement().dataset.widget || widget_c.getSelectedElement().dataset.imageid || widget_c.getSelectedElement().dataset.header) {
            $(widget_c.getSelectedElement()).remove()
        }
    }
    
})

$("body").keyup(function(event) {
    if(event.keyCode == 17) {
        ctrlPressed = true
    }
    else if(event.keyCode == 67) {
        copyPressed = false
    }
    else if(event.keyCode == 86) {
        pastePressed = false
    }
})
