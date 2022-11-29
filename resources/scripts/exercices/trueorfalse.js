import { createBtnAction } from "../utils/addBtn.js";

function createTrueOrFalseTxt(parent)
{
    let box = $("<div>");
    box.css({"word-break": "break-word", "display":"flex", "align-items":"center"})
    box[0].dataset.type = "trueorfalse"

    let txt = $("<p>");
    txt.addClass("eaxoText");
    txt[0].textContent = "Random text"

    let tOrF = $("<p>");
    tOrF.addClass("eaxoText");
    tOrF.css({"flex-grow": 1, "text-align":"right"})
    tOrF[0].textContent = "Vrai.... Faux....";

    txt.appendTo(box)
    tOrF.appendTo(box)

    box.appendTo(parent)
}

function createTrueOrFalse(parent) {
    //$(parent).collision(".eaxoResizable");
    
    createBtnAction(function(btn) {
        btn.on("click", function() {
            createTrueOrFalseTxt(parent)
        })
    }, "+").appendTo(parent)

    createBtnAction(function(btn) {
        btn.on("click", function() {
            let last = parent[0].children[parent[0].children.length - 1]
            if(last.dataset.type == "trueorfalse") {
                $(last).remove();
            }
        })
    }, "-").appendTo(parent)

    for (var i = 0; i < 5; i++) {
        createTrueOrFalseTxt(parent)
    }

    

}

const exo = {"name" : "trueorfalse", "func" : createTrueOrFalse};
export {exo};