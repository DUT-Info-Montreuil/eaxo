import {createLinesElement} from '../elements/lines.js'
import {createText} from '../elements/text.js'

function createWrite(parent) {
    let div = $("<div>");

    createText(parent);
    createLinesElement(parent);
    
    div.appendTo(parent);

}

const exo = {"name" : "write", "func" : createWrite};
export {exo};