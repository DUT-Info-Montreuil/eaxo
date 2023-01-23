
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
/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/