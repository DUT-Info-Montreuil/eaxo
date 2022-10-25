function editableNode(node) {
    let array = ["h", "p"]
    for(var n in array) {
        if(node.tagName.toLowerCase().includes(array[n]) && node.tagName != "PAGE") {
            return true
        }
        
    }

    return false
}

function createTextBox(parent, place, text) {
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

function cloneElement(original, id) {
    
    var clone = original.clone();
    let array = clone[0].classList;
    let attrs = clone[0].dataset.widget



    for(var i = 0; i < array.length; i++) {
        
        if(array[i] != "eaxoDraggable") {
            clone.removeClass(array[i])
        }

        if(array[i] =="eaxoResizable") {
            $("#pageTest" + id).resizable({
                containment:"#pageContainer"
            });
        }
    }

    
    clone.appendTo("#pageContainer");
    clone.attr("id", "pageTest" + id);

   
    $("#pageTest" + id).draggable({
        containment:"#pageContainer"
    });

    if(attrs == "box") {
        var inputArray = ["village", "villape", "ville", "village", "sillage", "loup", "loupe", "louve", "long", "loup"]
        for(var i  = 0; i < inputArray.length; i++) {
            createTextBox(clone, i, inputArray[i])
        }
        
    }

}

function loadChildren(wid) {
    for(var i = 0; i < wid.children.length; i++) {
        let child = wid.children[i];
        $(child).draggable();
    }
}

$( function() {
    

    $( ".widgetResizable" ).resizable({
        containment:"#pageContainer"
    });

    $(".eaxoDraggable").draggable();

    $(".eaxoClonable").draggable({
        helper:"clone",
        revert:true,
        revertDuration:0
    });


    $("#pageContainer").droppable({
        accept:".eaxoClonable",
        drop:function(event, ui) {
            loadChildren(ui.draggable[0])
            cloneElement(ui.draggable, widgets_controller.getNewID());
            
            
        }
    }) 

    
    $("#pageContainer").on("click", function(handler) {
        var target = handler.target;
        if(target.id != "pageContainer" && editableNode(target) && !target.inputAdded ) {
            
            var oldTxt = target.textContent;
            

            var oldTxt = target.textContent;
            target.textContent = ""
            target.inputAdded = true

            let input = $("<input>")
            input.attr("type", "text")
            
            input.appendTo(target);
            input.attr("value", oldTxt)

            function saveContent(target, input) {
                //Allow click before destroying input
                target.inputAdded = false
                if(input.val() == "") {
                    target.textContent = oldTxt;
                } else {

                    target.textContent = input.val()
                    input.remove()
                }
            }

        
            input.keypress(function(eventData, handler) {
                if(eventData.originalEvent.key == "Enter") {
                    saveContent(target, input)
                } 
            })

            $("#pageContainer").on("click", "#saveChange", function() {
                saveContent(target, input)
            })
        }  
    })

} ); 