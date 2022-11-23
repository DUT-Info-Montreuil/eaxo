
function createSurrounded(parent) {
    let box = $("<div>");
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

    box.appendTo(parent)

}

const exo = {"name" : "box", "func" : createSurrounded};
export {exo};
//exerciceList.registerExercice("box", createSurrounded);