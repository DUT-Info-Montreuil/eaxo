export function createTextBox(parent, place, text) {
    
    let box = $("<div>");
    box.addClass("eaxoDraggable")
    box.addClass("eaxoBox")

    let txt = $("<p>");
    txt.addClass("eaxoText");
    txt[0].textContent = text

    let initialLeft = 100

    let top = 50 + (place >= 5 ?  50 : 0) ;
    let left =  (place >= 5 ? -83 + (place-5) * 20 : initialLeft + (place) * 20) 
    box.css({top:top, left:left, position:"relative"});

    txt.appendTo(box)
    box.appendTo(parent)

    box.draggable({
        snap:parent
    });
    
}