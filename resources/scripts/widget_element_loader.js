//import exo  from './surronded.js'
//We can't get folder content, then we need to manually declare files which we want to load
const allWidgets = ["surronded", "trueorfalse", "write"];
const allElements = ["text", "lines"];

class WidgetElementLoader {
    constructor() {
        this.list = {}
        this.elementList = {}

        //Load all elements
        for(var i = 0; i < allElements.length; i++) {
            import("./elements/" + allElements[i] + ".js").then(module => {
                this.registerElement(module.element)

            })
        }

        //Load all widgets
        for(var i = 0; i < allWidgets.length; i++) {
            import("./exercices/" + allWidgets[i] + ".js").then(module => {
                
                this.registerExercice(module.exo)

                
            })
        }
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