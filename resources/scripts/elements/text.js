export function createText(parent, isPreview) {
    let text = $("<textarea>");
    text.addClass("eaxoInput")

    if(isPreview) {
        //text.attr("readonly", "readonly")
    }
    text.text("Value")
    text.addClass("eaxoText");
    

    let canChange = true
    text.on("drag", function(event, ui) {

        if (event.shiftKey) {
            let target = event.target;
            let parent = target.parentNode;

            let oldLeft = ui.originalPosition.left;
            let oldTop = ui.originalPosition.top;

            let posX = Math.abs(oldTop - ui.position.top)
            let posY = Math.abs(oldLeft - ui.position.left)

            if(canChange && Math.abs(posX - posY) > 3) {
                if(posX > posY) {
                    text.draggable("option", "axis", "y");
                } else {
                    text.draggable("option", "axis", "x");
                }

                canChange = false
            }
        }
    })

    text.draggable();
    

    text.on("dragstop", function(event, ui) {
        text.draggable("option", "axis", false);
        canChange = true
    })

    text.appendTo(parent);
}

const element = {"name" : "text", "func" : createText};
export {element};

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/