document.getElementById('registerForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
 
    fetch('api/register.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({username, password})
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert('Registration successful!');
            window.location.href = 'login.html';
        } else {
            document.getElementById('registerError').textContent = data.message;
        }
    });
 });
 
 document.getElementById('loginForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
 
    fetch('api/login.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({username, password})
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            window.location.href = data.isAdmin ? 'admin_dashboard.html' : 'user_dashboard.html';
        } else {
            document.getElementById('error').textContent = data.message;
        }
    });
 });
 
 document.getElementById('addTicketForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const type = document.getElementById('ticketType').value;
    const price = document.getElementById('price').value;
    const discount = document.getElementById('discount').value;
 
    fetch('api/add_ticket.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({type, price, discount})
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert('Ticket added successfully!');
            location.reload(); // Refresh to show new ticket in the list.
        } else {
            alert(data.message);
        }
    });
 });
 