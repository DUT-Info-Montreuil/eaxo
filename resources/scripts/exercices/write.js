import {createLinesElement} from '../elements/lines.js'
import {createText} from '../elements/text.js'

function createWrite(parent) {
    let div = $("<div>");

    console.log(parent)
    createText(parent);
    createLinesElement(parent);
    
    /*let box = $("<div>");
    box.css({"word-break": "break-word", "display":"flex", "align-items":"center"})

    let txt = $("<p>");
    txt.addClass("eaxoText");
    txt[0].textContent = "Random text"

    let tOrF = $("<p>");
    tOrF.addClass("eaxoText");
    tOrF.css({"flex-grow": 1, "text-align":"right"})
    tOrF[0].textContent = "Vrai.... Faux....";

    txt.appendTo(box)
    tOrF.appendTo(box)

    box.appendTo(parent)*/
    div.appendTo(parent);

}

const exo = {"name" : "write", "func" : createWrite};
export {exo};