$(document).ready(function () {
    // Function to update the send button state
    const updateSendButtonState = () => {
        const selectedContacts = $('input.form-check-input[name="inputSMS[]"]:checked');
        const selectedEvent = $('#inputEvent').val();
        const selectedLocation = $('#inputEventLoc').val();
        const customMessage = $('#inputcustom_msg').val();

        // Disable the send button if the selected event is 'OTHER'
        $('#brgy_externalSendButton').prop('disabled', !(selectedContacts.length > 0 && selectedEvent && selectedLocation && selectedEvent !== 'OTHER'));
    };

    // Event listeners using arrow functions for brevity
    $('input.form-check-input[name="inputSMS[]"]').change(() => updateSendButtonState());
    $('#inputEvent, #inputEventLoc').change(() => updateSendButtonState());
    $('#inputcustom_msg').on('input', () => updateSendButtonState());

    // External send button click event listener
    $('#brgy_externalSendButton').click(function () {
        // Call the updateSendButtonState function to ensure the button is disabled if needed
        updateSendButtonState();

        // Rest of your existing code for the external send button click event
        const selectedContacts = $('input.form-check-input[name="inputSMS[]"]:checked').map(function () {
            return $(this).val();
        }).get();
        const selectedEvent = $('#inputEvent').val();
        const selectedLocation = $('#inputEventLoc').val();
        const customMessage = $('#inputcustom_msg').val();

        // Skip computations if the selected event is 'OTHER'
        if (selectedEvent === 'OTHER') {
            console.log("Sending AJAX request with data:", {
                contacts: selectedContacts,
                event: selectedEvent,
                location: selectedLocation,
                custom_message: customMessage
            });

            // Make an AJAX request without land size computations
            $.ajax({
                type: 'POST',
                url: 'barangay_send_sms.php',
                data: {
                    contacts: selectedContacts,
                    event: selectedEvent,
                    location: selectedLocation,
                    custom_message: customMessage
                },
                success: function (response) {
                    // Log the response from send_sms.php
                    console.log(response);

                    // Handle success here
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Messages sent successfully!'
                    });
                },
                error: function (xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed in sending messages!'
                    });
                }
            });
        } else {
            // Include the formatted date and time values from the selected option
            const formattedDate = $('#inputEvent option:selected').data('formatted-date');
            const formattedTime = $('#inputEvent option:selected').data('formatted-time');
            const formattedDate2 = $('#inputEvent option:selected').data('formatted-date2');
            const formattedTime2 = $('#inputEvent option:selected').data('formatted-time2');

            // Include the full name and barangay from all selected checkboxes
            const data = $('input.form-check-input[name="inputSMS[]"]:checked').map(function () {
                return {
                    full_name: $(this).data('full-name'),
                    brgy: $(this).data('brgy'),
                };
            }).get();

            // Separate full names and barangay values into separate arrays
            const fullNames = data.map(function (item) {
                return item.full_name;
            });

            const barangays = data.map(function (item) {
                return item.brgy;
            });

            console.log("Sending AJAX request with data:", {
                contacts: selectedContacts,
                event: selectedEvent,
                location: selectedLocation,
                custom_message: customMessage,
                formatted_date: formattedDate,
                formatted_time: formattedTime,
                formatted_date2: formattedDate2,
                formatted_time2: formattedTime2,
                full_names: fullNames,
                barangays: barangays,
            });

            // Make an AJAX request
            $.ajax({
                type: 'POST',
                url: 'barangay_send_sms.php',
                data: {
                    contacts: selectedContacts,
                    event: selectedEvent,
                    location: selectedLocation,
                    custom_message: customMessage,
                    formatted_date: formattedDate,
                    formatted_time: formattedTime,
                    formatted_date2: formattedDate2,
                    formatted_time2: formattedTime2,
                    full_names: fullNames,
                    barangays: barangays,
                },
                success: function (response) {
                    // Log the response from send_sms.php
                    console.log(response);

                    // Handle success here
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Messages sent successfully!'
                    });
                },
                error: function (xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed in sending messages!'
                    });
                }
            });
        }
    });

    // Initial check to disable the send button
    updateSendButtonState();
});
