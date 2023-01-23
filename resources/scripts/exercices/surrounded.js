import { createBtnAction } from "../utils/addBtn.js";

function createBtnFor(div) {
    createBtnAction(function(btn) {
        btn.on("click", function() {
            let txt = $("<p>");
            txt.addClass("eaxoText");
            txt.addClass("subsurrounded")
            txt[0].dataset.type = "subsurrounded"
            txt[0].textContent = "Random text"
            //txt.addClass("surrounded")
            txt.appendTo(div)
        })
    }, "+").prependTo(div)

    createBtnAction(function(btn) {
        btn.on("click", function() {
            let children = div.find("[data-type='subsurrounded']");
            let last = children[children.length - 1]
            
            
            if(last && last.dataset.type == "subsurrounded") {
                $(last).remove();
            }
        })
    }, "-").prependTo(div)
}
function loadBtn(parent) {
    
    var parent = $(parent);
    var subrounded = parent.find("div[data-type='surrounded']");
    for(var i = 0; i < subrounded.length; i++) {
        if($(subrounded[i]).find("button").length < 1) {
            createBtnFor($(subrounded[i]))
        }
    }
    
}

function addLine(parent) {
    var parent = $(parent);


    let box = $("<div>");
    box.css({"word-break": "break-word", "display":"flex", "align-items":"center"})
    box[0].dataset.type = "surrounded";

    let txt = $("<p>");
    txt.addClass("eaxoText");
    txt[0].textContent = "Random text"
    txt.addClass("surrounded")

    txt.appendTo(box)

    createBtnFor(box)

    box.appendTo(parent)


    
}


function createSurrounded(parent) {
    
    parent = $(parent)
    loadBtn(parent)
    createBtnAction(function(btn) {
        btn.on("click", function() {
            addLine(parent)
        })
    }, "+").prependTo(parent)

    createBtnAction(function(btn) {
        btn.on("click", function() {
            let last = parent.children()[parent.children().length - 1]
            if(last.dataset.type == "surrounded") {
                $(last).remove();
            }
        })
    }, "-").prependTo(parent)

    setTimeout(function() {
        loadBtn(parent)
    }, 1)
}

const exo = {"name" : "surrounded", "func" : createSurrounded};
export {exo};
//exerciceList.registerExercice("box", createSurrounded);


/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/