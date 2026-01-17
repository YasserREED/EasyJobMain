$(function () {
    "use strict";

    function initializeWizardAndInputTell() {
        /* Basic Wizard Init*/
        if ($("#example-basic").length > 0) {
            $("#example-basic").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "fade",
                autoFocus: true,
                titleTemplate: "#title#",
                onStepChanged: function (event, currentIndex, newIndex) {
                    // Check if the current step is the third step (index 2)
                    if (newIndex === 1) {
                        initializeInputTell(); // Call the inputTell initialization function
                    }
                },
                onFinished: function (event, currentIndex) {
                    try {
                        var dialCodeInput =
                            document.getElementById("dial_code");
                        dialCodeInput.value = window.iti.getNumber();
                    } catch (e) {}
                    $("#freeForm").submit();
                },
            });
        }
    }

    // Initialize inputTell
    function initializeInputTell() {
        // InputTell initialization code
        var input = document.querySelector("#phone");
        var iti = window.intlTelInput(input, {
            geoIpLookup: function (callback) {
                $.get("http://ipinfo.io", function () {}, "jsonp").always(
                    function (resp) {
                        var countryCode =
                            resp && resp.country ? resp.country : "sa";
                        callback(countryCode);
                    }
                );
            },
            utilsScript:
                "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/js/utils.js",
            initialCountry: "auto",
            separateDialCode: "true",
            autoInsertDialCode: "true",
        });

        window.iti = iti;
        addressDropdown = document.querySelector("#nationality");

        // set it's initial value
        addressDropdown.value = iti.getSelectedCountryData().iso2;

        // listen to the telephone input for changes
        input.addEventListener("countrychange", function (e) {
            addressDropdown.value = iti.getSelectedCountryData().iso2;
        });

        // listen to the address dropdown for changes
        addressDropdown.addEventListener("change", function () {
            iti.setCountry(this.value);
        });
    }

    // Initialize the wizard and inputTell
    initializeWizardAndInputTell();
});
