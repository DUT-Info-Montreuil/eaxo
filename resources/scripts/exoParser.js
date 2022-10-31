class ExoParser {
    constructor() {
        this.page = $("#pageContainer")
        this.exoArray = {}
        
    }

    //Remove unset css and function style
    clearArray(array) {
        let style = {}
        for(var key in array) {
           if(array[key] && array[key] != "" && typeof(array[key]) != "function") {
            style[key] = array[key]
           }
           
        }

        return style
    }

    loadStyles(jQueryElement, element) {
        
        if (element.style) {
            for(var key in element.style) {
                if(key != "length" && key != "cssText") {
                    if (!parseInt(key) && key != "0") {
                        let str = `${key}`
                        $(jQueryElement).css(str, element.style[key])
                    }
                    
                }
                
            }
        }
    }

    stringifySub(element, parent, array) {
        let jQueryElement = $(element);
        let arrayObj;

        if(element.nodeName == "DIV") {
            array[jQueryElement.attr("id")] = array[jQueryElement.attr("id")] ? array[jQueryElement.attr("id")] : {}
            arrayObj = array[jQueryElement.attr("id")];
        } else {
            array[parent.children.length > 0 ? parent.children.length + 1 : 0] = {}
            arrayObj = array[parent.children.length > 0 ? parent.children.length + 1 : 0]
        }

        arrayObj.nodeName = element.nodeName;
        arrayObj.nodeID = jQueryElement.attr("id")
        arrayObj.parent = parent.attr("id")

        if(element.innerText != "" && element.nodeName != "DIV") {
            arrayObj.textContent = element.innerText
        }
        
        arrayObj.classList = element.classList
        arrayObj.children = {length:0}
        
        arrayObj.style = this.clearArray(jQueryElement[0].style)

        if(element.nodeName == "DIV") {
            

            for(var i = 0; i < jQueryElement.children().length; i++) {

                this.stringifySub(jQueryElement.children()[i], jQueryElement, arrayObj.children)
                arrayObj.children.length++
            }
        }

        
        
    }

    stringify(callback) {
        this.exoArray.children = {}
        for(var i = 0; i < this.page.children().length; i++) {
            this.stringifySub(this.page.children()[i], this.page, this.exoArray.children)
        }

        let json = JSON.stringify(this.exoArray);

        if(callback) {
            callback(json)
        }


    }


    loadChild(child, parent) {
        //console.log(child)
        let nodeElement = $(`<${child.nodeName}>`)
        if(child.nodeID) {
            nodeElement.attr("id", child.nodeID);
        }
        
        if(child.textContent) {
            nodeElement.text(child.textContent)
        }

        //Add class
        for(var classID in child.classList) {
            
            nodeElement.addClass(child.classList[classID])
        }
        
        //Add to parent
        
        nodeElement.appendTo($(parent))

        //Load custom css style
        this.loadStyles(nodeElement, child)

        for(var objElement in child.children) {
            let subChild = child.children[objElement]
            this.loadChild(subChild, "#" + child.nodeID)
        }
    }

    saveExo() {
        
        $("#spinnerLoading").css({"opacity":1});
        this.stringify(function(json) {
            let data = {
                exoJson : json
            }
            $.post("./traitement.php", data, function(result) {
                console.log(result)
                setTimeout(function() {
                    $("#spinnerLoading").css({"opacity":0} );
                }, 300)
                

            })
        })
    }

    loadExo(jsonExo) {
        if(jsonExo) {
            let parsedElement = JSON.parse(jsonExo)
            for(var key in parsedElement.children) {
                this.loadChild(parsedElement.children[key], "#pageContainer")
            }
        }
    }
}

const exoParser = new ExoParser();
export default exoParser;