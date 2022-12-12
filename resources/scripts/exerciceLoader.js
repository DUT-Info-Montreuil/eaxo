import jqueryLoader from "./loader/jqueryLoader.js";
import {createLinesElement} from './elements/lines.js'
import {exo} from './exercices/surrounded.js'
import {exo as sur} from './exercices/trueorfalse.js'

class ExerciceLoader {
    constructor() { 
        let exoID = $("#pageContainer")[0].dataset.exoid;
        this.loadExercice(exoID);
        this.loaderFunction = {}
        this.loaderFunction["lines"] = createLinesElement;
        this.loaderFunction["surrounded"] = exo["func"];
        this.loaderFunction["trueorfalse"] = sur["func"];
    }

    loadExercice(exoID) {
        let self = this;
        $.get("./api/exercice/get.php?exoID=" + exoID, {}, function(result) {
            if(result.code == 1) {
                self.createExercice(result.content);
            }
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
                jElement[0].dataset[ind] = dataset[ind];
                console.log(ind)
                if(ind == "lines") {
                    this.loaderFunction[ind](jElement[0])
                } else if (ind == "widget" && this.loaderFunction[dataset[ind]]) {

                    this.loaderFunction[dataset[ind]](jElement[0])
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


    }

}

const exoLoader = new ExerciceLoader();
export default exoLoader;