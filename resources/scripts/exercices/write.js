import {createLinesElement} from '../elements/lines.js'
import {createText} from '../elements/text.js'

function createWrite(parent) {
    let div = $("<div>");

    let phrase = $("<p>")
    phrase.addClass("text-center")
    phrase.text("Une phrase quelconque ?")
    phrase.appendTo(parent)
    createLinesElement(parent);
    
    div.appendTo(parent);

}

const exo = {"name" : "write", "func" : createWrite};
export {exo};