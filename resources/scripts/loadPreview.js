import {createLinesElement} from './elements/lines.js'

class PreviewLoader{
    constructor() {
        this.loadPreviews();
    }

    loadPreviews() {
        createLinesElement($(".elementPreview"), true)
    }
}

const previewLoader = new PreviewLoader();
export default previewLoader;