import { createBtnAction } from "../utils/addBtn.js";

function addLine(parent) {
    let box = $("<div>");
    box.css({"word-break": "break-word", "display":"flex", "align-items":"center"})
    box[0].dataset.type = "surrounded";

    let txt = $("<p>");
    txt.addClass("eaxoText");
    txt[0].textContent = "Random text"
    txt.addClass("surrounded")

    txt.appendTo(box)

    box.appendTo(parent)


    createBtnAction(function(btn) {
        btn.on("click", function() {
            let txt = $("<p>");
            txt.addClass("eaxoText");
            txt.addClass("subsurrounded")
            txt[0].dataset.type = "subsurrounded"
            txt[0].textContent = "Random text"
            //txt.addClass("surrounded")
            txt.appendTo(box)
        })
    }, "+").prependTo(box)

    createBtnAction(function(btn) {
        btn.on("click", function() {
            let children = box.find("[data-type='subsurrounded']");
            let last = children[children.length - 1]
            
            
            if(last && last.dataset.type == "subsurrounded") {
                $(last).remove();
            }
        })
    }, "-").prependTo(box)
}


function createSurrounded(parent) {
    
    createBtnAction(function(btn) {
        btn.on("click", function() {
            addLine(parent)
        })
    }, "+").prependTo(parent)

    createBtnAction(function(btn) {
        btn.on("click", function() {
            let last = parent[0].children[parent[0].children.length - 1]
            if(last.dataset.type == "surrounded") {
                $(last).remove();
            }
        })
    }, "-").prependTo(parent)

}

const exo = {"name" : "surrounded", "func" : createSurrounded};
export {exo};
//exerciceList.registerExercice("box", createSurrounded);