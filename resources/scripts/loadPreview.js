import {createLinesElement} from './elements/lines.js'

class PreviewLoader{
    constructor() {
        //this.loadPreviews();
        this.previewFunction = {}
    }

    loadPreviews() {
        let self = this;
        setTimeout(function() {
            let preview = $(".elementPreview");
            for(var i = 0; i < preview.length ;i++) {
                let parent = preview[i];
                let name = preview[i].dataset["eaxoelement"];
                
                console.log(self.previewFunction["text"]);
                
                if(self.getPreview(name)) {
                    //console.log(self.getPreview(name))
                    self.getPreview(name)(parent, true);
                }
            }
        })
    }

    register(name, func) {
        this.previewFunction[name] = func;
    }

    getPreview(name) {
        return this.previewFunction[name];
    }
}

const previewLoader = new PreviewLoader();
export default previewLoader;