export function createText(cloned) {
    cloned.addClass("eaxoText");
    

    let canChange = true
    cloned.on("drag", function(event, ui) {

        if (event.shiftKey) {
            let target = event.target;
            let parent = target.parentNode;

            let oldLeft = ui.originalPosition.left;
            let oldTop = ui.originalPosition.top;

            let posX = Math.abs(oldTop - ui.position.top)
            let posY = Math.abs(oldLeft - ui.position.left)

            if(canChange && Math.abs(posX - posY) > 3) {
                if(posX > posY) {
                    cloned.draggable("option", "axis", "y");
                } else {
                    cloned.draggable("option", "axis", "x");
                }

                canChange = false
            }
        }
    })

    cloned.on("dragstop", function(event, ui) {
        cloned.draggable("option", "axis", false);
        canChange = true
    })
}

const element = {"name" : "text", "func" : createText};
export {element};