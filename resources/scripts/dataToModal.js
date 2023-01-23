class dataToModal {

    constructor() {
        $(".open-idNameToModal").on("click", function (event, ui) {
            console.log(event);
            var id = event.target.dataset.id;
            var name = event.target.dataset.name;
            console.log(id);
            console.log(name);
            $(".modal-body #id").val( id );
            $(".modal-body #name").text( name );
        });
    }
}
const dataSaver = new dataToModal();
export default dataSaver;

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/