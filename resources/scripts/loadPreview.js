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
                
                if(self.getPreview(name)) {
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

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/