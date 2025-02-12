async function handleSubmit(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const password = document.getElementById('password').value;

    const response = await fetch('https://your-backend-server.com/api/save', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ name, password })
    });

    if (response.ok) {
        alert('Data saved successfully!');
    } else {
        alert('Failed to save data.');
    }
}