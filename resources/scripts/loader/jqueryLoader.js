//Load drag, resizable, etc..

class JQueryLoader {
    constructor() {

    }


    loadElement(element) {
        
        for(var i = 0; i < element[0].classList.length; i++) {
            let name = element[0].classList[i];
            switch(name) {
                
                case "ui-draggable":
                    element.draggable({
                        containment:element[0].parentElement
                    })
                    break;
            }
        }


        this.loadDataset(element[0]);
    }

    loadDataset(element) {
        console.log(element.dataset)
    }
}


const jqueryLoader = new JQueryLoader();

export default jqueryLoader;