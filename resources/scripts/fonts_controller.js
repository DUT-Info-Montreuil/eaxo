import widget_c from "./widgets_controller.js";

function changeFontSize(size) {
    if(widget_c.getSelectedElement()) {
        //console.log(widget_c.getSelectedElement())
        $(widget_c.getSelectedElement()).css({"font-size" : size})
    }
}

function toggleFontBold() {
    if(widget_c.getSelectedElement()) {
        let parent = widget_c.getSelectedElement();
        let value = $(parent).css("font-weight");

        //700 for bold
        if(parseInt(value) < 700) {
            $(parent).css({"font-weight" : "bold"});
        } else {
            $(parent).css({"font-weight" : ""});

        }
    }
}

function toggleItalic() {
    if(widget_c.getSelectedElement()) {
        let parent = widget_c.getSelectedElement().parentElement;
        let value = $(parent).css("font-style");
        if(value != "italic") {
            $(parent).css({"font-style" : "italic"});
        } else {
            $(parent).css({"font-style" : "normal"});

        }
    }
}

$("#btnBold").click(function() {
    toggleFontBold();
})

$("#btnItalic").click(function() {
    toggleItalic();
})

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

