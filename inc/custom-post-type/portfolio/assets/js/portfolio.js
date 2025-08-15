"use strict";
document.addEventListener('DOMContentLoaded', function () {

    document.querySelector('#grouped-repeater-wrapper').addEventListener('click', function(event) {
        event.preventDefault();
        event.stopPropagation();

        /*
         * This is triggered when clicking on an element with the class "group" or "accordion-header"
         * Toggle the class "active" on the .accordion-header within the clicked .group
         */
        if( event.target.classList.contains('group') ) {
            var accordionHeader = event.target.querySelector('.accordion-header');
            if (accordionHeader) accordionHeader.classList.toggle('active');

        } else if ( event.target.closest('.accordion-header') ) {
            event.target.closest('.accordion-header').classList.toggle('active');
        }


        // Check if the clicked element has the class "cloneable-clone"
        if ( event.target.classList.contains('cloneable-clone') ) {
            // Find the closest ancestor with the class "group" and remove it
            if ( event.target.closest('.group') ) {
                // Deep clone the selected element
                var clonedElement = event.target.closest('.group').cloneNode(true);

                var accordionHeader = clonedElement.querySelector('.accordion-header');
                if ( accordionHeader.classList.contains('active') ) accordionHeader.classList.remove('active');
                
                // Append the new .group to the .group element after
                event.target.closest('.group').after(clonedElement);
            }
        }

        
        // Check if the clicked element has the class "cloneable-remove"
        if ( event.target.classList.contains('cloneable-remove') ) {
            // Find the closest ancestor with the class "group" and remove it
            if ( event.target.closest('.group') ) event.target.closest('.group').remove();
        }

        
        // Check if the clicked element has the class "add-group"
        if ( event.target.classList.contains('add-group') ) {
            // Create a new .group element
            var newGroup = document.createElement('div');
            newGroup.classList.add('group');
    
            // Append the necessary child elements to the new .group
            newGroup.innerHTML = `
                <div class="accordion-header active">
                    <span class="accordion-header-icon"></span>
                    <span class="accordion-header-placeholder"></span>
                </div>
                <div class="cloneable-helper">
                    <i class="cloneable-move"></i>
                    <i class="cloneable-clone"></i>
                    <i class="cloneable-remove" data-confirm="Are you sure to delete this item?"></i>
                </div>
            `;
    
            // Append the new .group to the wrapper/button before
            event.target.before(newGroup);

        }

        // console.log(event.target);






        if ( event.target.classList.contains('add-group') ) {
            var groupContainer = document.createElement('div');
            groupContainer.classList.add('group');

            groupContainer.innerHTML = `
                <input type="text" name="grouped_repeater_field[group][]">
                <input type="hidden" name="grouped_repeater_field[image][]" class="image-url">
                <div class="image-preview"></div>
                <input type="button" class="button upload-image" value="Upload Image">
            `;

            // event.target.before(groupContainer);
        }

        if (event.target.classList.contains('upload-image')) {
            var imageField = event.target.parentElement.querySelector('.image-url');
            var imagePreview = event.target.parentElement.querySelector('.image-preview');

            var imageUploader = wp.media({
                title: 'Upload Image',
                button: {
                    text: 'Select Image'
                },
                multiple: false
            });

            imageUploader.on('select', function () {
                var attachment = imageUploader.state().get('selection').first().toJSON();
                imageField.value = attachment.url;
                imagePreview.innerHTML = `<img src="${attachment.url}" alt="Image Preview" style="max-width: 100px; max-height: 100px;" />`;
            });

            imageUploader.open();
        }
        
    });













    const groupedRepeaterWrapper = document.querySelector('#grouped-repeater-wrapper');

    // Drag-and-drop functionality
    const groups = document.querySelectorAll('.group');
    let draggedGroup = null;

    groups.forEach(function(group) {
        group.draggable = true;

        group.addEventListener('dragstart', () => {
            console.log(group);

            draggedGroup = group;
            setTimeout(() => {
                group.style.opacity = '0.5';
            }, 0);
        });

        group.addEventListener('dragend', () => {

            draggedGroup.style.opacity = '1';
            draggedGroup = null;
        });
    });

    groupedRepeaterWrapper.addEventListener('dragover', (e) => {
        e.preventDefault();
    });

    groupedRepeaterWrapper.addEventListener('drop', (e) => {
        e.preventDefault();

        console.log(e.target);

        if (draggedGroup) {
            groupedRepeaterWrapper.insertBefore(draggedGroup, e.target);
        }
    });
    







    





});