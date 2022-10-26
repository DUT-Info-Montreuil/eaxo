export function getFontProperty(name) {
    switch(name) {
        case "Cursive":
            return {"font-family":"'Cursive'"};
        case "Arial":
            return {"font-family":"'Arial'"};
    }

    return {}
}