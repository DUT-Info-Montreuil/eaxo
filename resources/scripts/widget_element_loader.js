//import exo  from './surronded.js'
//We can't get folder content, then we need to manually declare files which we want to load
const allWidgets = ["surronded", "trueorfalse", "write"];
const allElements = ["text", "lines"];
import previewLoader from './loadPreview.js'

class WidgetElementLoader {
    constructor() {
        this.list = {}
        this.elementList = {}

        //Load all elements
        for(var i = 0; i < allElements.length; i++) {
            import("./elements/" + allElements[i] + ".js").then(module => {
                this.registerElement(module.element)
                previewLoader.register(module.element.name, module.element.func);

            })
        }

        //Load all widgets
        for(var i = 0; i < allWidgets.length; i++) {
            import("./exercices/" + allWidgets[i] + ".js").then(module => {
                
                this.registerExercice(module.exo)

                
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

    registerElement(mod) {
        this.elementList[mod.name] = mod.func;
    }
    
    loadElement(name) {
        return this.elementList[name]
    }
}


const widgetElementLoader = new WidgetElementLoader();
export default widgetElementLoader;