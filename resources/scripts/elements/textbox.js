import widget_c from "../widgets_controller.js";


export function createTextBox(parent, place, text) {
    parent.maxHeight = parent.maxHeight ?  parent.maxHeight : 0;
    
    let box = $("<div>");
    box.addClass("eaxoDraggable")
    box.addClass("eaxoBox")
    box.attr("id", widget_c.getNewID(box[0]))


    let txt = $("<p>");
    txt.addClass("eaxoText");
    txt[0].textContent = text

    let initialLeft = 100

    let top = 50 + (place >= 5 ?  50 : 0) ;
    let left =  (place >= 5 ? (place - 5) * 150 : place * initialLeft ) 
    box.css({top:top, left:left, position:"absolute"});

    

    txt.appendTo(box)
    box.appendTo(parent)

    let elementHeight = top + $(box).innerHeight()
    //We need to resize parent div
    parent.maxHeight = elementHeight > parent.maxHeight ? elementHeight : parent.maxHeight 

    $(parent).css({"height" : parent.maxHeight});
    box.draggable({
        //snap:parent
    });

    let canChange = true;

    box.on("drag", function(event, ui) {

        
        let target = event.target;
        let parent = target.parentNode;

        let align;

        let oldLeft = ui.originalPosition.left;
        let oldTop = ui.originalPosition.top;

        //console.log(ui)


        /*for(var i = 0; i < parent.childNodes.length; i++) {
            let child = $(parent.childNodes[i]);
            
            
        }*/
        let posX = Math.abs(oldTop - ui.position.top)
        let posY = Math.abs(oldLeft - ui.position.left)

        console.log(`x : ${posX} y : ${posY}`)
        if(canChange && Math.abs(posX - posY) > 3) {
            if(posX > posY) {
                box.draggable("option", "axis", "y");
            } else {
                box.draggable("option", "axis", "x");
            }

            canChange = false
        }
    })

    box.on("dragstop", function(event, ui) {
        box.draggable("option", "axis", false);
        console.log("daccord")
        canChange = true
    })

    
    
} 