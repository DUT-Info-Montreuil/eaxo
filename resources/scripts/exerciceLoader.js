import jqueryLoader from "./loader/jqueryLoader.js";
import {createLinesElement} from './elements/lines.js'

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

            //Append to the parent first
            if(elementData.parentId == null) {
                jElement.appendTo($("#pageContainer"));
            } else {
                
                jElement.appendTo($("#" + elementData.parentId));
            }
        
            let objectCSS = JSON.parse(elementData.css);
            let dataset = JSON.parse(elementData.dataset);

            for(let ind in dataset) {
                jElement[0].dataset[ind] =  dataset[ind];
                if(ind == "lines") {
                    createLinesElement(jElement[0])
                }
            }
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
                jElement.text(elementData.content.replace(/['"]+/g, ''));
            } 

            
            
            jqueryLoader.loadElement(jElement);
        }

        //console.log($("#" + parentID))
    }

}

const exoLoader = new ExerciceLoader();
export default exoLoader;