let tilt = document.querySelectorAll(".rounded");
VanillaTilt.init(tilt, {
  max: 3,
  speed: 500,
  scale: 1.05,
  glare: true,
  "max-glare": 0.3,
});

document.getElementById('contactForm').addEventListener('submit', function (event) {
  event.preventDefault(); // Prevents the default form submission

  const formData = new FormData(this);
  const name = formData.get('name');
  const email = formData.get('email');
  const message = formData.get('message');

  // Simple validation - Check if fields are not empty
  if (!name || !email || !message) {
    alert('Please fill in all fields.');
    return;
  }

  // Additional validation (e.g., email format validation)
  const emailRegex = /^\S+@\S+\.\S+$/;
  if (!emailRegex.test(email)) {
    alert('Please enter a valid email address.');
    return;
  }

  // If the form passes validation, proceed to submit the form using fetch
  fetch('send_email.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    // Handle the response from the server
    console.log('Message sent successfully!');
    // You can also show a success message or perform other actions here
  })
  .catch(error => {
    // Handle any errors that occurred during the fetch
    console.error('Error:', error);
  });
});
