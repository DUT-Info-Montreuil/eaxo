
import {createBtnAction} from '../utils/addBtn.js'

function drawLines(canvas) {
    canvas[0].getContext("2d").clearRect(0,0, canvas[0].width, canvas[0].height)
    let lines = canvas.data("lines");
    //Create each line
    let sizeW = 3.799 * 8;
    canvas[0].height = (3.779 * 8) * (lines + 1);

    for(var countLines = 0; countLines <  lines; countLines++) {

        for(var i = 0; i < 5; i++) {
            //if(countLines <= 1 && i != 0) {
                let ctx = canvas[0].getContext("2d");
                ctx.beginPath();
                ctx.moveTo(0, i * (3.779 * 2) + sizeW * countLines);
                ctx.lineTo(canvas[0].width, i * (3.779 * 2) + sizeW * countLines);

                if(i %4 == 0) {
                    ctx.strokeStyle = '#373737';
                } else {
                    ctx.strokeStyle = '#d5d5d5';
                }

                ctx.stroke();
            //}
        }
    }

    for(var i = 0; i < parseInt(canvas[0].width / sizeW); i++) {
        let ctx = canvas[0].getContext("2d");
        
        ctx.beginPath();
        ctx.moveTo(i * 37.79, 0);
        ctx.strokeStyle = '#373737';
        ctx.lineTo(i * 37.79, canvas[0].height - sizeW);
        ctx.stroke();
        
    }

    canvas[0].dataset["width"] = canvas[0].width
    canvas[0].dataset["height"] = canvas[0].height
}


//Origin can be div or canvas
function createLinesElement(origin, isPreview) {
    let appendBtnTo;
    let canvas;
    if(origin.nodeName != "CANVAS") {
        appendBtnTo = origin;
        let canvasDiv = $("<div>")
        canvas = $("<canvas>");
        canvas.data({"lines": 1});

        if(origin.css) {
            canvas[0].width = parseInt(origin.css("width").substring(0, origin.css("width").indexOf("px")));
        } else {
            canvas[0].width = 0
        }
        
        if(!isPreview) {
            canvasDiv.draggable({
                containment:origin
            });
        } else {
            canvas[0].width = 200;
        }

        canvas.appendTo(canvasDiv);
        canvasDiv.appendTo(origin)
    } else {
        canvas = $(origin);
        let parent = $(canvas).parent()
        console.log(parent)
        appendBtnTo = parent

        console.log(parent.css("width"))

        if(parent.css) {
            canvas[0].width = parseInt(parent.css("width").substring(0, parent.css("width").indexOf("px")));
        } else {
            canvas[0].width = 0
        }
    }

    if(!isPreview) {
        createBtnAction(function(btn) {
            btn.on("click", function() {
                let nbLines = canvas.data("lines");
                canvas.data({"lines": nbLines- 1 > 0 ? nbLines- 1: 0})
                drawLines(canvas)
            })
            
        }, "-").prependTo(appendBtnTo)

        createBtnAction(function(btn) {
            btn.on("click", function() {
                let nbLines = canvas.data("lines");
                canvas.data({"lines": nbLines+ 1})
                drawLines(canvas)
            })
        }, "+").prependTo(appendBtnTo)

    }

    drawLines($(canvas))

    
}

const element = {"name" : "lines", "func" : createLinesElement};
export {element, drawLines, createLinesElement};
