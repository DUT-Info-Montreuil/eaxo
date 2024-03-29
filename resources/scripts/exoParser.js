import widget_c from "./widgets_controller.js"

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
        let dataValues = jQueryElement.data();
        let arrayObj;

        if(!dataValues["nosave"]) {
    
            jQueryElement.attr("id", widget_c.getNewID(element));

            array[jQueryElement.attr("id")] = array[jQueryElement.attr("id")] ? array[jQueryElement.attr("id")] : {}
            arrayObj = array[jQueryElement.attr("id")];
            arrayObj.dataset = {}

            for(var dataAttr in dataValues) {
                if(typeof(dataAttr) == "string" && typeof(dataValues[dataAttr]) != "object") {
                    arrayObj.dataset[dataAttr] = dataValues[dataAttr];
                }
            }

            arrayObj.nodeName = element.nodeName;
            arrayObj.nodeID = jQueryElement.attr("id");
            arrayObj.parent = parent.attr("id")

            if(element.innerText != "" && element.nodeName != "DIV") {
                arrayObj.textContent = element.innerText
            }
            
            arrayObj.classList = element.classList
            arrayObj.children = {length:0}
            
            arrayObj.style = this.clearArray(jQueryElement[0].style)

            //Only div can include html element,so just extends tree when we found new div
            if(element.nodeName == "DIV") {
                for(var i = 0; i < jQueryElement.children().length; i++) {

                    this.stringifySub(jQueryElement.children()[i], jQueryElement, arrayObj.children)
                    arrayObj.children.length++
                }
            }
        }
        
    }

    stringify(callback) {
        this.exoArray.children = {}

        if(this.page.children().length > 0) {
            for(var i = 0; i < this.page.children().length; i++) {
                this.stringifySub(this.page.children()[i], this.page, this.exoArray.children)
            }
        }

        let json = JSON.stringify(this.exoArray);

        if(callback) {
            callback(json)
        }

    }


    loadChild(child, parent) {
        let nodeElement = $(`<${child.nodeName}>`)
        if(child.nodeID) {
            nodeElement.attr("id", child.nodeID);
        }
        
        if(child.textContent) {
            nodeElement.text(child.textContent)
        }

        //Add class
        for(var classID in child.classList) {
            if(child.classList[classID] != "eaxoSelectedBorder") {
                nodeElement.addClass(child.classList[classID])
            }
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
            $.post("./api/exercice/save.php", data, function(result) {

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

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/