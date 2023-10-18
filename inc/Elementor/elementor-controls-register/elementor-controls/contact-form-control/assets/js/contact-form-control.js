window.addEventListener( 'elementor/init', () => {

    var contactForm = elementor.modules.controls.BaseData.extend({ 

        onReady: function() {

            var self = this;
            
            var userDefineEmail = this.el.querySelector('.boxshadow-contact-form-user-define-email');
            
            userDefineEmail.addEventListener('input', function(event) {
                
                self.saveValue();

            });

            var checkBoxes = this.el.querySelectorAll('.boxshadow-contact-form');

            for(var i= 0; i < checkBoxes.length; i++) {

                checkBoxes[i].addEventListener('change', function(event) {

                    self.saveValue();

                });
            }

        },

        saveValue: function() {
            
            var data = {};

            var userDefineEmail = this.el.querySelector('.boxshadow-contact-form-user-define-email');
            
            function isValidEmail(email) {
                return String(email)
                .replace(/[\s\t]+/gm, '')
                .toLowerCase()
                .match(
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
            }

            // replace() Function Removing Space, Tab, Enter.
            var userDefineEmailValue = userDefineEmail.value;

            var emailCheck = isValidEmail(userDefineEmailValue);
            if ( emailCheck ) {

                data["user_define_email"] = emailCheck.input;

            } else {

                data["user_define_email"] = userDefineEmail.getAttribute('default-value') || '';

            }

            var checkBoxes = this.el.querySelectorAll('.boxshadow-contact-form');

            for(var i= 0; i < checkBoxes.length; i++) {
                data[checkBoxes[i].name] = `${checkBoxes[i].checked}`;
            }
            
            this.setValue(data);

        },

        onBeforeDestroy: function() {
            
            this.saveValue();

        }

    });

    elementor.addControlView( 'BOXSHADOW_CONTACT_FORM', contactForm );

} );