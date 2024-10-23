$(document).ready(function() {
    // Connect to the socket server
    const socket = io('http://localhost:3000'); // Ensure this matches your server port

    // Function to create and show a new notification using SweetAlert
    function showNotification(message) {
        Swal.fire({
            title: 'Notification',
            text: message,
            icon: 'success',
            timer: 30000,
            timerProgressBar: true,
            showCloseButton: true,
            showConfirmButton: false,
            willClose: () => {
                // Optional: Do something when the alert closes
            }
        });
    }

    // Handle form submission
    if ($('#notifyForm').length) {
        $('#notifyForm').on('submit', function(e) {
            e.preventDefault();
            const name = $('#name').val();
            const message = $('#message').val();
            socket.emit('formSubmit', { name: name , message: message});
            $('#message').val('');
            $('#name').val('');
        });
    }

    // Listen for notifications from the server
    socket.on('notification', function(data) {
        showNotification(data.message);
    });
});
