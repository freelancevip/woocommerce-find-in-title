jQuery(document).ready(function ($) {
    function showRow(event) {
        event.preventDefault();
        $(this).closest("tr").next().toggle();
    }

    $(document).on("click", ".wfit-edit", showRow);
});