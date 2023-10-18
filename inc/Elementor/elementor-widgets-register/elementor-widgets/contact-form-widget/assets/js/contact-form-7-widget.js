"use strict";

// Wait for the DOM content to be fully loaded before executing the code
document.addEventListener("DOMContentLoaded", function () {
    var contact_form_7 = document.querySelectorAll('form');
    
    // If no such elements are found or their count is zero (is empty), stop the script's execution
    if (!contact_form_7 || contact_form_7.length === 0) return;

    // Loop through each form element
    contact_form_7.forEach(function(form) {
        // Set the 'autocomplete' attribute of the form to 'off'
        form.setAttribute('autocomplete', 'off');
    });
});
