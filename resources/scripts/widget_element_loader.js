//We can't get folder content, then we need to manually declare files which we want to load
const allWidgets = ["surrounded", "trueorfalse", "write"];
const allElements = ["text", "lines"];
const header = ['modele_1']
import previewLoader from './loadPreview.js'

class ExoRegisterManager {
    constructor() {
        this.list = {}
        this.elementList = {}
        this.headerList = {}

        //Load all elements
        for(var i = 0; i < allElements.length; i++) {
            import("./elements/" + allElements[i] + ".js").then(module => {
                this.registerElement(module.element)
                previewLoader.register(module.element.name, module.element.func);

            })
        }

        //Load all exercices
        for(var i = 0; i < allWidgets.length; i++) {
            import("./exercices/" + allWidgets[i] + ".js").then(module => {
                this.registerExercice(module.exo)  
            })
        }

         //Load all header
         for(var i = 0; i < header.length; i++) {
            import("./headers/" + header[i] + ".js").then(module => {
                this.registerHeader(module.header)  
            })
        }

        previewLoader.loadPreviews();
    }

    loadExercice(name) {
        return this.list[name]
    }


    registerExercice(mod) {
        this.list[mod.name] = mod.func;
    }

    registerHeader(header) {
        this.headerList[header.name] = header.func;
    }

    registerElement(mod) {
        this.elementList[mod.name] = mod.func;
    }
    
    loadElement(name) {
        return this.elementList[name]
    }

    loadHeader(name) {
        return this.headerList[name]
    }
}


const widgetElementLoader = new ExoRegisterManager();
export default widgetElementLoader;