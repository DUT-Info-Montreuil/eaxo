import widget_c from "../widgets_controller.js";


export function createTextBox(parent, place, text) {
    parent.maxHeight = parent.maxHeight ?  parent.maxHeight : 0;
    
    let box = $("<div>");
    box.addClass("eaxoDraggable")
    box.addClass("eaxoBox")
    box.attr("id", "div" + widget_c.getID())


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
        snap:parent
    });

    box.on("drag", function(event, ui) {
        let target = event.target;
        let parent = target.parentNode;

        let align;

        let oldLeft = ui.originalPosition.left;
        let oldTop = ui.originalPosition.top;

        //Check if we need to align vertical or horizontally
        if(Math.abs((ui.position.top - ui.originalPosition.top)) > Math.abs((ui.position.left - ui.originalPosition.left)) )  {
            align = "top"
        } else {
            align = "left"
        }
        let element = null;
        let distance = -1

        for(var i = 0; i < parent.childNodes.length; i++) {
            let child = $(parent.childNodes[i]);
            
            let style = child[0].style;
            if(style && !$(target).is(child) && child[0].nodeName != "H3") {
                console.log(child)
                let top = parseFloat(style.top);
                let left = parseFloat(style.left);
                
                if(distance < 0 || (top * top + left * left) < distance) {
                    console.log(distance)
                    distance = (top * top + left * left)
                    element = child;
                }
                

                
            }
        }

        if(element != null) {
            $(element).css({"background-color" : "black"})
            let style = element[0].style;

            let top = parseFloat(style.top);
            let left = parseFloat(style.left);

            setTimeout(function() {
                if(align == "top") {
                    $(target).css({"top" : top})
                    $(target).css({"top" : oldLeft})
                } else {
                    $(target).css({"left" : left})
                    $(target).css({"left" : oldTop})
                }

            }, 1)
        }
    })

    
    
} 