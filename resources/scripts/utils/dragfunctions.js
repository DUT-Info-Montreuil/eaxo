function checkCollision(rec1, rec2) {
    var rectTopLeft = {x: rec1.position().left, y: rec1.position().top}
    var rectBottomRight = {x: rec1.outerWidth() + rec1.position().left, y: rec1.position().top +  rec1.outerHeight()}

    var otherRectTopLeft = {x: rec2.position().left, y: rec2.position().top}
    var otherRectBottomRight = {x: rec2.outerWidth() + rec2.position().left, y: rec2.position().top +  rec2.outerHeight()}

    if ((rectTopLeft.x  <  otherRectBottomRight.x)  &&  (rectBottomRight.x   >  otherRectTopLeft.x )  &&
    (  rectTopLeft.y  <  otherRectBottomRight.y  )  &&
        (  rectBottomRight.y  >  otherRectTopLeft.y  )  )
    {
        return true
    } else {
        return false 
    }
}

function loadDragFunction(element, container) {
    element.draggable({
        containment:container,
        drag:function(event, ui) {
            var exoList = $("[data-widget='box']")
            for(var i = 0; i < exoList.length; i++) {
                var exo = $(exoList[i]);
                if(element[0].id != exoList[i].id) {
                    if (checkCollision(element, exo)) {
                        
                       return true;
                    }
                }
            }
        }
    })
}

export {loadDragFunction};

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/