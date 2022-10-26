import { createTextBox } from "./scripts/textbox";
import widget_c from "./widgets_controller";
import {getFontProperty} from './scripts/fonts';

console.log(widget_c.getID());
console.log(widget_c.getID());
function editableNode(node) {
    let array = ["h", "p"]
    for(var n in array) {
        if(node.tagName.toLowerCase().includes(array[n]) && node.tagName != "PAGE") {
            return true
        }
        
    }

    return false
}

$( "select" ).on("click", function() {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).text()
      
    });
    console.log(str)
    if(str) {
        let element = widget_c.getSelectedElement();
        $(element).css(getFontProperty(str))
    }
})


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
            cloneElement(ui.draggable, widget_c.getID());
            
            
        }
    }) 

    
    $("#pageContainer").on("click", function(handler) {
        var target = handler.target;
        console.log(widget_c.getSelectedElement())
        if(target.id != "pageContainer" && editableNode(target) && !widget_c.getSelectedElement()) {
            widget_c.setSelectedElement(target);
            var oldTxt = target.textContent;
            

            var oldTxt = target.textContent;
            target.textContent = ""

            let input = $("<input>")
            input.attr("type", "text")
            
            input.appendTo(target);
            input.attr("value", oldTxt)

            function saveContent(target, input) {
                //Allow click before destroying input
                widget_c.setSelectedElement(null)
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
