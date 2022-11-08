import { createTextBox } from "./elements/textbox.js";
import widget_c from "./widgets_controller.js";
import {getFontProperty} from './elements/fonts.js';
import {cloneElement} from './cloneelement.js'
import exoParser from './exoParser.js'
import {createLinesElement} from './elements/lines.js'
import previewLoader from './loadPreview.js'



$( "select" ).on("click", function() {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).text()
      
    });
    if(str) {
        let element = widget_c.getSelectedElement();
        $(element).css(getFontProperty(str))
    }
})



$( function() {
    

    $( ".widgetResizable" ).resizable({
        containment:"#pageContainer"
    });

    $(".eaxoDraggable").draggable();

    $(".eaxoClonable").draggable({
        helper:"clone",
        revert:true,
        revertDuration:0,
    });


    $("#pageContainer").droppable({
        accept:".eaxoClonable",
        drop:function(event, ui) {
            
            //loadChildren(ui.draggable[0])
            cloneElement(ui.draggable);
            //exoParser.stringify(); 
        }
    }) 

    $(".eaxoText", function() {
        console.log("ok")
    })

    //exoParser.stringify();
    //exoParser.loadExo("test")

} ); 
