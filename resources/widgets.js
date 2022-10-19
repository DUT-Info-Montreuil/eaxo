function reloadChildren(element) {
    var id = widgets_controller.getNewID();
    var child = element.children();


    if (element.hasClass("widgetResizable")) {
        element.attr("id", "pageTest" + id);

        element.removeClass("widgetResizable");
        element.removeClass("widgetDraggable");
        element.removeClass("widgetClonable");
    }

    if (child.hasClass("widgetResizable")) {
        child.attr("id", "pageTest" + id);

        child.removeClass("widgetResizable");
        child.removeClass("widgetDraggable");
        child.removeClass("widgetClonable");
    }

    $("#pageTest" + id).resizable({
        containment:"#pageContainer"
    });
    $("#pageTest" + id).draggable({
        containment:"#pageContainer"
    });

    if (element.children().length > 0) {
        reloadChildren(element.children());
    }
}

function cloneElement(original, id) {
    
    var clone = original.clone();

    clone.removeClass("widgetResizable");
    clone.removeClass("widgetDraggable");
    clone.removeClass("widgetClonable");

    reloadChildren(clone);

    if (original.hasClass("ui-state-active")) {
        clone.addClass("ui-state-active");
    }

    
    clone.appendTo("#pageContainer");
    clone.attr("id", "pageTest" + id);

    $("#pageTest" + id).resizable({
        containment:"#pageContainer"
    });
    $("#pageTest" + id).draggable({
        containment:"#pageContainer"
    });

}

$( function() {
    

    $( ".widgetResizable" ).resizable({
        containment:"#pageContainer"
    });

    $(".widgetDraggable").draggable();

    $(".widgetClonable").draggable({
        helper:"clone",
        revert:true,
        revertDuration:0
    });


    $("#pageContainer").droppable({
        accept:".widgetClonable",
        drop:function(event, ui) {

            cloneElement(ui.draggable, widgets_controller.getNewID());
            
        }
    }) 

    
    $("#pageContainer").on("click", function(handler) {
        var target = handler.target;

        if(target.id != "pageContainer" && !target.inputAdded ) {

            var oldTxt = target.textContent;
            

            var oldTxt = target.textContent;
            target.textContent = ""
            target.inputAdded = true

            var input = $("<input>")
            input.attr("type", "text")
            
            input.appendTo(target);
            input.attr("value", oldTxt)

        
            input.keypress(function(eventData, handler) {
                if(eventData.originalEvent.code == "Enter") {
                    if(input.val() == "") {
                        target.textContent = oldTxt;
                    } else {

                        target.textContent = input.val()
                        input.remove()
                    }
                    
                    target.inputAdded = false
                }
            })

            console.log(this)

            input.on("click", function()
            {
                console.log("ok")
            })

        


        }

        
    })


} ); 