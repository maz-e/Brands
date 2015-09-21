jQuery(function() {
    document.formvalidator.setHandler('brand_name',
        function (value) {
            // Match any single character except symbols 
            regex=/^[^$-/:-?{-~!"^_`\[\]]+$/;
            return regex.test(value);
        });
});
