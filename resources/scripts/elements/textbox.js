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
    
      
} 

/*const element = {"name" : "text", "func" : createText};
export {element};*/