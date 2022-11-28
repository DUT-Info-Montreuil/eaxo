
import exoParser from './exoParser.js'
let ctrlPressed = false
let copyPressed = false
let pastePressed = false



$("body").keydown(function(event) {
    
    
    //Save
    if(event.ctrlKey && event.keyCode == 83) {
        event.preventDefault();
        exoParser.saveExo();
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
