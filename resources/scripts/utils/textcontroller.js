/*
    This function create input to allow editing text
*/

import widget_c from "../widgets_controller.js";

export function enableEdit(widgetController, node) {
    $(node).css("background-color", "aliceblue");
    $("#fontSizeInput").val($(node).css("font-size"));
    widgetController.setSelectedElement(node);
    var oldTxt = node.textContent;
    

    var oldTxt = node.textContent;
    node.textContent = ""

    let input = $("<input>")
    input.attr("type", "text")
    input.addClass("eaxoInput")

    //We want same style for input and text
    input.css({"width":"100%", "font-weight":"inherit", "font-style":"inherit"})
    
    
    input.appendTo(node);
    input.attr("value", oldTxt)
    input.focus();

    //Focus on last character
    input[0].setSelectionRange(input.val().length, input.val().length)

    function saveContent(node, input) {
        //Allow click before destroying input
        widgetController.setSelectedElement(null)
        if(input.val() == "") {
            node.textContent = oldTxt;
        } else {

            node.textContent = input.val()
            input.remove()
        }

        $(node).css("background-color", "");
    }

    
    input.keypress(function(eventData, handler) {
        if(eventData.originalEvent.key == "Enter") {
            saveContent(node, input)
        } 
    })

    $("#pageContainer").on("click", "#saveChange", function() {
        if(widgetController.getSelectedElement()) {
            saveContent(node, input)
        }
    })

    //Need to be fixed
    $("body").on("click", function(handler) {
        let target = handler.target;

        if(widget_c.getSelectedElement() && (target.nodeName == "PAGE")) {
            if(target.nodeName == "PAGE" || $(target) != $(widget_c.getSelectedElement())) {
                saveContent(node, input)
            }
        }
    })
}

