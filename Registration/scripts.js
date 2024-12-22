$(document).ready(function() {
    $('#applicationForm').on('submit', function(e) {
        e.preventDefault();

        // Basic form validation
        let isValid = true;
        $(this).find('input, select, textarea').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('error');
            } else {
                $(this).removeClass('error');
            }
        });

        if (!isValid) {
            showMessage('Please fill all required fields', 'error');
            return;
        }

        // Collect form data
        const formData = {
            fullName: $('#fullName').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            dob: $('#dob').val(),
            education: $('#education').val(),
            address: $('#address').val()
        };

        // Submit form using AJAX
        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: formData,
            success: function(response) {
                try {
                    const result = JSON.parse(response);
                    if (result.success) {
                        $('#applicationForm')[0].reset();
                        showMessage('Application submitted successfully!', 'success');
                        displayApplicationDetails(formData);
                    } else {
                        showMessage('Error: ' + result.message, 'error');
                    }
                } catch (e) {
                    showMessage('An error occurred while processing your request', 'error');
                }
            },
            error: function() {
                showMessage('An error occurred while submitting the form', 'error');
            }
        });
    });

    function showMessage(message, type) {
        $('#responseMessage')
            .removeClass('success error')
            .addClass(type)
            .html(message)
            .fadeIn();
    }

    function displayApplicationDetails(data) {
        const details = `
            <div class="application-details">
                <h2>Application Details</h2>
                <p><strong>Name:</strong> ${data.fullName}</p>
                <p><strong>Email:</strong> ${data.email}</p>
                <p><strong>Phone:</strong> ${data.phone}</p>
                <p><strong>Date of Birth:</strong> ${data.dob}</p>
                <p><strong>Education:</strong> ${data.education}</p>
                <p><strong>Address:</strong> ${data.address}</p>
            </div>
        `;
        $('#responseMessage').after(details);
    }
});
