import widget_c from "./widgets_controller.js";

function changeFontSize(size) {
    if(widget_c.getSelectedElement()) {
        //console.log(widget_c.getSelectedElement())
        $(widget_c.getSelectedElement()).css({"font-size" : size})
    }
}

$("#decreaseFontSize").click(function() {
    let input = $("#fontSizeInput");
    let size = parseInt(input.val()) - 1
    changeFontSize(size);
    input.val(size)

})

$("#increaseFontSize").click(function() {
    let input = $("#fontSizeInput");
    let size = parseInt(input.val()) + 1
    changeFontSize(size);
    input.val(size)
})