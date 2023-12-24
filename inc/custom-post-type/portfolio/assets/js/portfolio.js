document.addEventListener('DOMContentLoaded', function() {
    var mediaFrame;

    document.getElementById('add_media_button').addEventListener('click', function(e) {
        e.preventDefault();
        

        if (mediaFrame) {
            mediaFrame.open();
            selectPreviousItems();
            return;
        }

        mediaFrame = wp.media({
            title: 'Add Portfolio',
            button: {
                text: 'Add to Portfolio'
            },
            multiple: true
        });

        mediaFrame.on('open', function() {
            // pre-select previous items
            selectPreviousItems();
        });

        mediaFrame.on('select', function() {
            var attachments = mediaFrame.state().get('selection').toJSON();
            var mediaItems = [];

            attachments.forEach(function(attachment) {
                var mediaItem = {
                    id: attachment.id,
                    type: attachment.type,
                    url: attachment.url
                };
                mediaItems.push(mediaItem);
            });

            // Update the media preview
            updateMediaPreview(mediaItems);
        });

        // mediaFrame.on('close', function() {
        // });
        
        mediaFrame.open();
    });
    
    // Remove media item
    var removeMediaItemsContainer = document.getElementById('media-upload-preview-container');
    if (removeMediaItemsContainer) removeMediaItem(removeMediaItemsContainer);

    // Function to pre-select previous items
    function selectPreviousItems() {
        var previousItemsInput = document.getElementById('media_data');
        if (previousItemsInput) {
            // Parse the JSON value inside the 'media_data' hidden input field
            var previousItems = JSON.parse(previousItemsInput.value);

            // Get the current media frame selection
            var selection = mediaFrame.state().get('selection');

            // Clear the current selection
            selection.reset();

            // Add the previously selected items to the current selection
            previousItems.forEach(function (item) {
                var attachment = wp.media.attachment(item.id);
                attachment.fetch();
                selection.add(attachment ? [attachment] : []);
            });
        }
    }

    // Update media preview
    function updateMediaPreview(mediaItems) {
        // Update the value of the 'media_data' hidden input field
        var previousMediaItemsInput = document.getElementById('media_data');
        if (previousMediaItemsInput) previousMediaItemsInput.value = JSON.stringify(mediaItems);

        var previewContainer = document.getElementById('media-upload-preview-container');
        previewContainer.innerHTML = '';

        mediaItems.forEach(function(mediaItem) {
            // Display selected media
            var mediaPreview = document.createElement('div');
            mediaPreview.classList.add('media-upload-preview');

            if (mediaItem.type === 'image') {
                mediaPreview.innerHTML = '<div class="thumbnail"><img src="' + mediaItem.url + '" alt="Image"></div><a class="remove" href="#">Remove</a>';
            } else if (mediaItem.type === 'audio') {
                mediaPreview.innerHTML = '<div class="thumbnail"><audio controls><source src="' + mediaItem.url + '" type="audio/mp3"></audio></div><a class="remove" href="#">Remove</a>';
            } else if (mediaItem.type === 'video') {
                mediaPreview.innerHTML = '<div class="thumbnail"><video controls><source src="' + mediaItem.url + '" type="video/mp4"></video></div><a class="remove" href="#">Remove</a>';
            }

            previewContainer.appendChild(mediaPreview);
        });

        // Remove media item
        if (previewContainer) removeMediaItem(previewContainer);
    }

    // Function to handle the removal of a media item when the corresponding 'Remove' link is clicked.
    function removeMediaItem(mediaItemsContainer) {
        var mediaItems = mediaItemsContainer.querySelectorAll('.media-upload-preview .thumbnail + .remove');

        mediaItems.forEach(function(mediaItem, index) {
            mediaItem.addEventListener('click', function(e) {
                e.preventDefault();
    
                var previousMediaItemsInput = document.getElementById('media_data');
                if (previousMediaItemsInput) {
                    // Parse the JSON value inside the 'media_data' hidden input field
                    var mediaItems = JSON.parse( previousMediaItemsInput.value );
    
                    // Remove an item from the 'mediaItems'
                    mediaItems.splice(index, 1);
    
                    // Update the media preview
                    updateMediaPreview(mediaItems);
                }
            });
        });
    }

});
