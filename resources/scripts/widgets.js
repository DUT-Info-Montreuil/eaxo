import { createTextBox } from "./elements/textbox.js";
import widget_c from "./widgets_controller.js";
import {getFontProperty} from './elements/fonts.js';
import {cloneElement} from './cloneelement.js'
import exoParser from './exoParser.js'
import {createLinesElement} from './elements/lines.js'
import dataSaver from './dataToModal.js' 

import exoLoader from './exerciceLoader.js'
import * as textcon from './utils/fonts_controller.js'
import * as vueimage from './modules/composants_images/vue_images.js'

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

} ); 

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/