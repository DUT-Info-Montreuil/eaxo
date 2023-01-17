function createHeaderModele(parent) {
    parent = $(parent)
    parent.empty();

    let divNameAndDate = $("<div>");
    divNameAndDate.addClass("d-flex justify-content-between")

    let name = $("<p>")
    name.text("Prenom: ____________________")
    name.css({"font-weight":"bold"})

    let date = $("<p>")
    date.text("Date __/___/____")
    date.css({"text-align":"right", "font-weight":"bold"})

    let background = $("<div>")
    background.css({"height" : 80, "background-color": "#7f7f7f"})
    background.addClass("d-flex justify-content-around")

    let divSchoolInfos = $("<div>")
    divSchoolInfos.addClass("flex-grow-1 text-center")
    let divGroupInfo = $("<div>")

    divGroupInfo.addClass("d-flex")
    divGroupInfo.css({"width": "30%"})
    divGroupInfo.html(`<div style='background-color:#5a5a5a; padding-left:5%; padding-right:5%; margin:5%'>
        <p class='d-inline'>Lecture</p>
        <p>Texte 2</p>
    </div>
    <div class='m-auto' style='border-radius:50%; background-color:white; width:60px; height:60px;'>
        <p class='d-inline'>Groupe</p>
        <p class='text-center'>1</p>
    </div>
    `)


    divSchoolInfos.html(`
        <p class='d-inline' style='font-size:22px;font-weight:bold '>Le Petit Chaperon Rouge </p>
        <p style='font-size:16px'>Charles Perrault</p>
    `)

    name.appendTo(divNameAndDate)
    date.appendTo(divNameAndDate)


    divSchoolInfos.appendTo(background)
    divGroupInfo.appendTo(background)

    divNameAndDate.appendTo(parent)
    background.appendTo(parent)
    
}

const header = {"name" : "modele_1", "func" : createHeaderModele};
export {header};