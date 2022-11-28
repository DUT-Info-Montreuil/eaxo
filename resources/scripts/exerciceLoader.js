import jqueryLoader from "./loader/jqueryLoader.js";

class ExerciceLoader {
    constructor() {
        this.loadExercice(1);
    }

    loadExercice(exoID) {
        let self = this;
        $.get("./api/exercice/get.php", {}, function(result) {
            self.createExercice(JSON.parse(result));
        })
    }

    findOrCreatElement(id) {
        let found = $("#" + id);
        if(!found) {
            console.log("ok")
        } else {
            //return $()
        }
    }

    organizeArray(array) {

    }

    createExercice(object) {
        let parentID = 0
        for(var arr in object) {
            let elementData = object[arr];
            let jElement = $("<" + elementData.wType + ">");
            jElement.attr('id', elementData.htmlID);
        
            let objectCSS = JSON.parse(elementData.css);

            //console.log(jElement)
            //Load css
            for(let ind in objectCSS) {
                if(CSS.supports(ind, objectCSS[ind])) {
                    jElement.css(ind, objectCSS[ind]);
                }
            }

            //Load class
            let elementClass = JSON.parse(elementData.class);

            for(let ind in elementClass) {
                jElement.addClass(elementClass[ind]);
            }
            

            //Set content
            if (elementData.content) {
                console.log(elementData.content);
                jElement.text(elementData.content.replace(/['"]+/g, ''));
            } 

            if(elementData.parentId == null) {
                jElement.appendTo($("#pageContainer"));
            } else {
                
                jElement.appendTo($("#" + elementData.parentId));
            }
            
            jqueryLoader.loadElement(jElement);
        }

        //console.log($("#" + parentID))
    }

}

const exoLoader = new ExerciceLoader();
export default exoLoader;