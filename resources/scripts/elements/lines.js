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
}



export function createLinesElement(parent, isPreview) {

    let canvasDiv = $("<div>")

    let canvas = $("<canvas>");
    canvas.data({"lines": 1});
    canvas[0].width = parseInt(parent.css("width").substring(0, parent.css("width").indexOf("px")));

    if(!isPreview) {
    

        let addBtn = $("<button>");
        addBtn.text("+");
        addBtn.css({"position": "relative", "left":"95%"})
        addBtn.addClass("hideForPrint");

        let removeBtn = $("<button>");
        removeBtn.text("-");
        removeBtn.css({"position": "relative", "left":"90%"})
        removeBtn.addClass("hideForPrint");

        addBtn.on("click", function() {
            let nbLines = canvas.data("lines");
            canvas.data({"lines": nbLines+ 1})
            drawLines(canvas)
        })
    
        removeBtn.on("click", function() {
            let nbLines = canvas.data("lines");
            canvas.data({"lines": nbLines- 1 > 0 ? nbLines- 1: 0})
            drawLines(canvas)
        })

        addBtn.appendTo(canvasDiv)
        removeBtn.appendTo(canvasDiv)

        //clone.remove();

        canvasDiv.draggable({
            containment:parent
        });
    } else {
        canvas[0].width = 200;
    }

    
    

    drawLines(canvas)
    
    
    canvas.appendTo(canvasDiv);
    canvasDiv.appendTo(parent)

    

    
    
}

const element = {"name" : "lines", "func" : createLinesElement};
export {element};