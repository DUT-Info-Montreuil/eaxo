export function createText(parent) {
    let text = $("<p>");

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
    

    text.on("dragstop", function(event, ui) {
        text.draggable("option", "axis", false);
        canChange = true
    })

    text.appendTo(parent);
}

const element = {"name" : "text", "func" : createText};
export {element};