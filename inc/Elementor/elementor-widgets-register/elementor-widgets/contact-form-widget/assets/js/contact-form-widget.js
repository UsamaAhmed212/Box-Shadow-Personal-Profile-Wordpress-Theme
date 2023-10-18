"use strict";

var adminUrl = document.location.hostname;
// Get Server Root Path
function admin_url(url) {
    adminUrl = url;
}

// Remove validation-bubble-message in form validation when input field use required Attribute.
document.addEventListener('invalid', (function () {
    return function (e) {
      e.preventDefault();
    };
})(), true);

document.addEventListener("DOMContentLoaded", function () {

    // This function trimStrings leading and trailing whitespaces from a string
    function trimString(string) {
        // Check if the input is a string
        if (typeof string !== 'string') {
            throw new Error('Input must be a string.');
        }
        
        return string.replace(/^\s+|\s+$/gm,'');
    }
    
    // The formDataSerialize() function  - form data converts (serialize) URL parameters.
    function formDataSerialize(form) {
        var field,
            l,
            s = [];
    
        if (typeof form == 'object' && form.nodeName == "FORM") {
            var len = form.elements.length;
    
            for (var i = 0; i < len; i++) {
                field = form.elements[i];
                                                                                                // [&& field.type != 'hidden'] Remove
                if (field.name && !field.disabled && field.type != 'button' && field.type != 'file' && field.type != 'reset' && field.type != 'submit') {   // [&& field.type != 'hidden'] Remove
                    if (field.type == 'select-multiple') {
                        l = form.elements[i].options.length;
    
                        for (var j = 0; j < l; j++) {
                            if (field.options[j].selected) {
                                s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value);
                            }
                        }
                    }
                    else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {
                        s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value);
                    }
                }
            }
        }
        return s.join('&');
    }

    // The formDataUnserialize() function - converts (serialized) URL parameters data back into actual (Object) data.
    function formDataUnserialize(str) {
        var obj = {}; 

        if ( typeof str === 'string' || str instanceof String ) {
            str.replace(/([^=&]+)=([^&]*)/g, function(m, key, value) {
                obj[decodeURIComponent(key)] = decodeURIComponent(value);
            });
        }
        
        return obj;
    }
    
    // The objectSerialize() function  - Object converts (serialize) URL parameters.
    function objectSerialize(object) {
        var str = [];
        for (var property in object) {
            if (object.hasOwnProperty(property)) {
                str.push(encodeURIComponent(property) + "=" + encodeURIComponent(object[property]));
            } 
        }
        return str.join("&");
    }

    // isValidEmail() function - Validate an email address using regular expression.
    function isValidEmail(email) {
        return String(email)
        .replace(/[\s\t]+/gm, '')
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    }

    // isValidPhoneNumber() function - Validate an phone number using regular expression. (function working)
    function isValidPhoneNumber(phoneNumber) {
        // Regular expression to match only digits (0-9) and optional spaces or dashes
        return String(phoneNumber)
        .replace(/[\s\t\-\+]+/gm, '')
        .replace(/^(\+)?/, '+')
        .match(/^(\+)?[\d\s\-]+$/);
     }
     
    // Function to remove all warning elements and warning messages
    function resetFormValidation() {
        // Remove all warning elements
        var warningElements = contactForm.querySelectorAll(".cf-not-valid-tip");
        for (var i = 0; i < warningElements.length; i++) {
            warningElements[i].remove();
        }
        
        // Remove warning message element
        var warningMessageElement = contactForm.querySelector(".cf-response-output");
        if (warningMessageElement) warningMessageElement.remove();
    }

    // Function to validate empty fields
    function validateEmptyFields(emptyFieldsArr) {
        var emptyFieldsInfoObj = {
            count: 0,
            fieldsInfo: {}
        };
        
        // Check if emptyFieldsArr is an array
        if ( Array.isArray(emptyFieldsArr) ) {

            for (var i = 0; i < emptyFieldsArr.length; i++) {

                var element = contactForm.querySelector('[name=' + emptyFieldsArr[i] + ']:not([type="hidden"])');
                
                if ( element && element.hasAttribute('required') && trimString(element.value) === '' ) {
                    emptyFieldsInfoObj.count++;
                    emptyFieldsInfoObj.fieldsInfo[element.name] = "Please fill out this field.";
                }

            }

        } else {

            var formData = formDataSerialize(contactForm);  // (serialize) URL parameters 

            var formDataObj = formDataUnserialize(formData);  // Object

            for (var key in formDataObj) {
            
                var element = contactForm.querySelector('[name=' + key + ']:not([type="hidden"])');
                
                if ( element && element.hasAttribute('required') && trimString(formDataObj[key]) === '' ) {
                    emptyFieldsInfoObj.count++;
                    emptyFieldsInfoObj.fieldsInfo[key] = "Please fill out this field.";
                }
    
            }

        }

        return emptyFieldsInfoObj;
    }

    // Function to validate form fields data
    function validateFieldsData() {
        var formData = formDataSerialize(contactForm);  // (serialize) URL parameters 

        var formDataObj = formDataUnserialize(formData);  // Object
        
        var validatedFieldsDataObj  = {};

        var invalidatedFieldsInfoObj = {
            count: 0,
            fieldsInfo: {}
        };

        for (var key in formDataObj) {
            
            var element = contactForm.querySelector('[name=' + key + ']');
            
            if ( element ) {

                if( trimString(formDataObj[key]) !== '' ) {
                  
                    switch (key) {
                        case 'email':
                            var emailCheck = isValidEmail(formDataObj[key]);
                            if ( emailCheck ) {
                                validatedFieldsDataObj[key] = emailCheck.input;
                            } else {
                                invalidatedFieldsInfoObj.count++;
                                invalidatedFieldsInfoObj.fieldsInfo[key] = "Please enter an email address.";
                            }
                            break;
                        case 'phone':
                                var phoneNumberCheck = isValidPhoneNumber(formDataObj[key]);
                                if ( phoneNumberCheck ) {
                                    validatedFieldsDataObj[key] = phoneNumberCheck.input;
                                } else {
                                    invalidatedFieldsInfoObj.count++;
                                    invalidatedFieldsInfoObj.fieldsInfo[key] = "Please enter a phone number.";
                                }
                            break;
                        default:
                            validatedFieldsDataObj[key] = trimString(formDataObj[key]);
                    }
                  
                } else {
                    validatedFieldsDataObj[key] = "";
                }

            }


        }
        
        return {
            invalidatedFieldsInfoObj,
            validatedFieldsDataObj
        };
    }

    // Function to show warnings for empty fields |and| set warning message Function call
    function setWarning(fieldsInfo) {

        for (var key in fieldsInfo) {
            
            var element = contactForm.querySelector("[name="+key+"]");
            
            if (!element) continue;
            
            var groupElement = element.parentElement.parentElement;
            
            groupElement.classList.add("warning");

            var warningElement = groupElement.querySelector(".cf-not-valid-tip");
            
            if (!warningElement) {
                warningElement = document.createElement("span");
                warningElement.classList.add("cf-not-valid-tip");
                warningElement.textContent = fieldsInfo[key];

                groupElement.insertAdjacentElement("beforeend", warningElement);
            }
            
        }
        
    }

    // Function to set the warning message
    function setWarningMessage(message, type) {
        var warningMessageElement  = contactForm.querySelector(".cf-response-output");

        if (!warningMessageElement ) {
            var warningMessageElement = document.createElement("div");
            warningMessageElement.classList.add("cf-response-output");
            if(type === 'sent') warningMessageElement.classList.add("sent");
            if(type === 'invalid') warningMessageElement.classList.add("invalid");
            warningMessageElement.innerText = message;

            contactForm.insertAdjacentElement("beforeend", warningMessageElement);
        }
    }


    // #contact-form > .send-btn  Click Effect
    var button = document.querySelector('#contact-form .send-btn');
    var contactForm = document.getElementById("contact-form");
    
    // Check if both the 'send' button and the contact form exist
    if (!button && !contactForm) return;

    // An array to track the changed fields
    var changedFields = [];

    contactForm.addEventListener('change', function(e) {
        e.stopPropagation();
        e.preventDefault();

        function previousFields(element) {
            var previousElement = element.previousElementSibling;
            var previousField = previousElement.querySelector('input:not([type="hidden"]), textarea, select');
            
            if (previousField) {
                // Check if the value of the input is empty and the field name is not already in the changedFields array
                if ( previousField.hasAttribute('required') && trimString(previousField.value) === '' && changedFields.indexOf(previousField.name) === -1 ) changedFields.unshift(previousField.name);
                
                previousFields(previousElement);
            }
        }
        previousFields(e.target.parentElement.parentElement);

        // Check if the value of the input is empty and the field name is not already in the changedFields array
        if ( e.target.hasAttribute('required') && trimString(e.target.value) === '' && changedFields.indexOf(e.target.name) === -1 ) changedFields.push(e.target.name);

        // Remove warning message element
        resetFormValidation();

        // Perform empty field validate
        var emptyFieldsInfo = validateEmptyFields(changedFields);
        
        // If there are empty fields, show warnings
        if (emptyFieldsInfo.count > 0) {

            setTimeout(function() {
                setWarning(emptyFieldsInfo.fieldsInfo);
            }, 300);
            
        }
        
        // Perform form field data validate
        var validateFieldsInfo = validateFieldsData();

        var invalidatedFieldsInfo = validateFieldsInfo.invalidatedFieldsInfoObj;
        
        if (invalidatedFieldsInfo.count > 0) {

            setTimeout(function() {
                setWarning(invalidatedFieldsInfo.fieldsInfo);
            }, 300);
            
        }

    });

    button.addEventListener('click', function(e) {
        e.stopPropagation();
        e.preventDefault();
        
        // Add 'active' class and disable the button
        button.classList.add('active');
        button.disabled = true;

        // Remove warning message element
        resetFormValidation();

        // Perform empty field validate
        var emptyFieldsInfo = validateEmptyFields();
        
        // If there are empty fields, show warnings
        if (emptyFieldsInfo.count > 0) {

            setTimeout(function() {
                setWarning(emptyFieldsInfo.fieldsInfo);
                
                // message, warning type
                setWarningMessage("One or more fields have an error. Please check and try again.", "invalid");
                
                // Re-enable the button and remove 'active' class
                button.disabled = false;
                button.classList.remove('active');
            }, 300);
            
        }
        
        // Perform form field data validate
        var validateFieldsInfo = validateFieldsData();

        var validateFormDataObj = objectSerialize(validateFieldsInfo.validatedFieldsDataObj);

        var invalidatedFieldsInfo = validateFieldsInfo.invalidatedFieldsInfoObj;
        
        if (invalidatedFieldsInfo.count > 0) {

            setTimeout(function() {
                setWarning(invalidatedFieldsInfo.fieldsInfo);

                // message, warning type
                setWarningMessage("One or more fields have an error. Please check and try again.", "invalid");
                
                // Re-enable the button and remove 'active' class
                button.disabled = false;
                button.classList.remove('active');
            }, 300);
            
        }
        
        if (emptyFieldsInfo.count > 0 || invalidatedFieldsInfo.count > 0) return;

        var dataObj = {
            action: "sand_mail",
            sand_mail: validateFormDataObj // (serialize) URL parameters
        };

        var data = objectSerialize(dataObj);  // (serialize) URL parameters
        
        // Contact Form Handling Using Ajax
        var xhr = new XMLHttpRequest();
        var method = "POST";
        var url = adminUrl;

        xhr.open(method, url, true);
        
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhr.responseType = "json";
        
        xhr.onreadystatechange = function () {
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var data = xhr.response;
                
                if (data.success === true) {
                    // message, warning type
                    setWarningMessage(data.data, "sent");
                } else {
                    // message, warning type
                    setWarningMessage(data.data, "invalid");
                }
                
                button.classList.remove('active');
                button.classList.add('finished');
                setTimeout(function() {
                    button.disabled = false;
                    contactForm.reset();
                    button.classList.remove("finished");
                }, 500);
            }
        };

        xhr.send(data);

    });
    
});
