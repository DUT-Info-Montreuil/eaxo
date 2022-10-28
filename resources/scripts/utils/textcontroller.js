export function enableEdit(widgetController, node) {
    widgetController.setSelectedElement(node);
    var oldTxt = node.textContent;
    

    var oldTxt = node.textContent;
    node.textContent = ""

    let input = $("<input>")
    input.attr("type", "text")
    
    input.appendTo(node);
    input.attr("value", oldTxt)

    function saveContent(node, input) {
        //Allow click before destroying input
        widgetController.setSelectedElement(null)
        if(input.val() == "") {
            node.textContent = oldTxt;
        } else {

            node.textContent = input.val()
            input.remove()
        }
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
}