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
                //console.log(exo[0].id == exoList[i].id)
                if(element[0].id != exoList[i].id) {
                    //console.log(ui.helper[0].id + " " + exoList[i].id)
                    if (checkCollision(element, exo)) {
                        console.log(element[0])
                        
                       return true;
                    }
                }
            }
        }
    })
}

export {loadDragFunction};