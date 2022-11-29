
//To avoid duplication, export '+' btn here
export function createBtnAction(func, txt) {
    let removeBtn = $("<button>");
    removeBtn.text(txt);
    removeBtn.css({"position": "relative", "left":"90%"})
    removeBtn.addClass("hideForPrint");
    removeBtn[0].dataset["nosave"] = true;
    
    func(removeBtn)

    return removeBtn;
}