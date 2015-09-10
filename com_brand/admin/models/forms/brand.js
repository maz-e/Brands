jQuery(function() {
    document.formvalidator.setHandler('brand_name',
        function (value) {
            regex=/^[^0-9]+$/;
            return regex.test(value);
        });
});