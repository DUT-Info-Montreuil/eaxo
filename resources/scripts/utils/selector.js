
var hold = false
var pos = {}
$("#pageContainer").mousedown(function(e) {
    if(e.target == this) {
        var offsetX = e.currentTarget.offsetLeft
        var offsetY = e.currentTarget.offsetTop
        pos = {x : e.originalEvent.clientX - offsetX, y : e.originalEvent.clientY - offsetY}
        
        hold = true;


        var selector = $("<div>")
        selector.attr("id", "elementSelector")
        selector.attr("class", "selector")
        selector.appendTo("#pageContainer")
        selector.css({"background-color": "rgba(0,142,255,0.9)", "border":"1px solid #dfdfdf"});
        selector.css({width: 1, height:1, left:pos.x, top:pos.y, position:"relative"});

        selector.hover(function(e) {
            $('.eaxoResizable').trigger(e.type); 
        })
    }
})

$("#pageContainer").mouseup(function() {
    hold = false
    $(".selector").remove();
})

$("#pageContainer").mousemove(function(e) {
    if(hold) {
        var page = $("#pageContainer");
        var maxCursorLeft = page.offset().left + page.width()

        var selector = $("#elementSelector")
        var offsetX = e.currentTarget.offsetLeft
        var offsetY = e.currentTarget.offsetTop

        var targetX = e.originalEvent.clientX - offsetX
        var targetY = e.originalEvent.clientY - offsetY
        
        

        if(targetX - pos.x > 0) {
            var bound = pos.x + e.originalEvent.clientX 

            selector.css({width: targetX, height:targetY})
        } else {
            var size = pos.x - targetX
            var posX = targetX
            selector.css({left: posX, height:targetY, width:size})
        }
    }
})

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/