jQuery(document).ready(function ($) {
    function showRow(event) {
        event.preventDefault();
        $(".wfit-close").hide();
        $("table").removeClass("active");
        $(this).closest(".wfit-inner-table").addClass("active");
        $(this).closest("tr").next().slideToggle();
    }

    function deleteRow() {
        $(this).parents(".wfit-inner-table").parents("tr").remove();
    }

    $(document).on("click", ".wfit-edit", showRow);
    $(document).on("click", ".wfit-delete", deleteRow);
});