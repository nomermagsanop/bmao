$(document).ready(function () {
    // Function to update the send button state
    const updateSendButtonState = () => {
        const selectedContacts = $('input.form-check-input[name="inputSMS[]"]:checked');
        const selectedEvent = $('#inputEvent').val();
        const selectedLocation = $('#inputEventLoc').val();
        const customMessage = $('#inputcustom_msg').val();

        // Disable the send button if the selected event is 'OTHER'
        $('#externalSendButton').prop('disabled', !(selectedContacts.length > 0 && selectedEvent && selectedLocation && selectedEvent !== 'OTHER'));
    };

    // Event listeners using arrow functions for brevity
    $('input.form-check-input[name="inputSMS[]"]').change(() => updateSendButtonState());
    $('#inputEvent, #inputEventLoc').change(() => updateSendButtonState());
    $('#inputcustom_msg').on('input', () => updateSendButtonState());

    // External send button click event listener
    $('#externalSendButton').click(function () {
        // Call the updateSendButtonState function to ensure the button is disabled if needed
        updateSendButtonState();

        // Rest of your existing code for the external send button click event
        const selectedContactsData = $('input.form-check-input[name="inputSMS[]"]:checked').map(function () {
            const checkbox = $(this);
            const contactData = checkbox.val().split(' ');
            return {
                contact: contactData[0],
                emergency_contact: contactData[1],
                farmer_id: checkbox.data('id'), // Use 'data-id' for farmer_id
                full_name: checkbox.data('full-name'),
                brgy: checkbox.data('brgy'),
                land_size: checkbox.data('land-size')
            };
        }).get();

        const selectedEvent = $('#inputEvent').val();
        const selectedLocation = $('#inputEventLoc').val();
        const customMessage = $('#inputcustom_msg').val();

        // Include the formatted date and time values from the selected option
        const formattedDate = $('#inputEvent option:selected').data('formatted-date');
        const formattedTime = $('#inputEvent option:selected').data('formatted-time');
        const formattedDate2 = $('#inputEvent option:selected').data('formatted-date2');
        const formattedTime2 = $('#inputEvent option:selected').data('formatted-time2');

        console.log("Sending AJAX request with data:", {
            contacts: selectedContactsData.map(item => item.contact),
            emergency_contacts: selectedContactsData.map(item => item.emergency_contact),
            event: selectedEvent,
            location: selectedLocation,
            custom_message: customMessage,
            formatted_date: formattedDate,
            formatted_time: formattedTime,
            formatted_date2: formattedDate2,
            formatted_time2: formattedTime2,
            full_names: selectedContactsData.map(item => item.full_name),
            barangays: selectedContactsData.map(item => item.brgy),
            land_sizes: selectedContactsData.map(item => calculateLandSize(selectedEvent, item.land_size)),
            farmer_ids: selectedContactsData.map(item => item.farmer_id)
        });

        // Make an AJAX request
        $.ajax({
            type: 'POST',
            url: 'send_sms.php',
            data: {
                contacts: selectedContactsData.map(item => item.contact),
                emergency_contacts: selectedContactsData.map(item => item.emergency_contact),
                event: selectedEvent,
                location: selectedLocation,
                custom_message: customMessage,
                formatted_date: formattedDate,
                formatted_time: formattedTime,
                formatted_date2: formattedDate2,
                formatted_time2: formattedTime2,
                full_names: selectedContactsData.map(item => item.full_name),
                barangays: selectedContactsData.map(item => item.brgy),
                land_sizes: selectedContactsData.map(item => calculateLandSize(selectedEvent, item.land_size)),
                farmer_ids: selectedContactsData.map(item => item.farmer_id)
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
    });

    // Initial check to disable the send button
    updateSendButtonState();
});

// Function to calculate land size based on the selected program
function calculateLandSize(selectedEvent, landSize) {
    switch (selectedEvent) {
        case 'ORGANIC SEEDS DISTRIBUTION':
        case 'HYBRID SEEDS DISTRIBUTION':
            return Math.ceil(landSize / 0.35) * 5 + "kg";
        case 'UREA FERTILIZER DISTRIBUTION':
            return Math.ceil(landSize / 0.5) + "bags";
        case 'NITROGEN-FIXING FERTILIZER DISTRIBUTION':
            return Math.ceil((landSize * 10000) / 2000) + "packs";
        default:
            return 0;
    }
}
