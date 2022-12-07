class dataToModal {

    constructor() {
        $(".open-DeletePageDialog").on("click", function (event, ui) {
            console.log(event);
            var exoNumber = event.target.dataset.id;
            var exoName = event.target.dataset.name;
            console.log(exoNumber);
            $(".modal-body #exoNumber").val( exoNumber );
            $(".modal-body #exoName").text( exoName );
        });
    }
}
const dataSaver = new dataToModal();
export default dataSaver;