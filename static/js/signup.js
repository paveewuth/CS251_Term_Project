// Accessing input fields from the DOM
const firstNameInput = document.getElementById('firstName');
const lastNameInput = document.getElementById('lastName');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirmPassword');
const genderInput = document.getElementById('gender');
const birthdayInput = document.getElementById('birthday');
const phoneNumberInput = document.getElementById('phoneNumber');
const houseNumberInput = document.getElementById('houseNumber');
const streetInput = document.getElementById('street');
const districtInput = document.getElementById('district');
const subdistrictInput = document.getElementById('subdistrict');
const provinceInput = document.getElementById('province');
const zipcodeInput = document.getElementById('zipcode');
const salaryInput = document.getElementById('salary');

// Accessing error message container
const errorMessageContainer = document.getElementById('error-message');

// Accessing form element
const signupForm = document.querySelector('form');

// Function to validate the entire form
function validateForm() {
    let hasErrors = false;

    // Reset any previous error messages
    emailInput.classList.remove('error');
    passwordInput.classList.remove('error');
    confirmPasswordInput.classList.remove('error');
  
    // Email validation
    if (!isValidEmail(emailInput.value)) {
      emailInput.classList.add('error');
      hasErrors = true;
    }
  
    // Password validation
    if (!isStrongPassword(passwordInput.value)) {
      passwordInput.classList.add('error');
      hasErrors = true;
    }

    // Password match validation
    const password = passwordInput.value;
    const confirmPassword = confirmPasswordInput.value;
    if (password !== confirmPassword) {
      confirmPasswordInput.classList.add('error');
      hasErrors = true;

      errorMessageContainer.textContent = 'Passwords do not match. Please try again.';
      errorMessageContainer.classList.add('error-message'); // Add error message class
  
      // Append error message container to the form
      if (!errorMessageContainer.parentNode) {
        signupForm.appendChild(errorMessageContainer);
      }
    } else {
      // Clear error message if passwords match
      errorMessageContainer.textContent = '';
      errorMessageContainer.classList.remove('error-message');
    }
  
    return !hasErrors; // Return true if no errors, false if there are errors
}

// Event listener for form submission
signupForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent default form submission
  
    if (validateForm()) {
      // Form validation successful
      // Simulate data storage (replace with your actual storage mechanism)
      const userData = {
        firstName: firstNameInput.value,
        lastName: lastNameInput.value,
        email: emailInput.value,
        password: passwordInput.value,
        gender: genderInput.value,
        birthday: birthdayInput.value,
        phoneNumber: phoneNumberInput.value,
        houseNumber: houseNumberInput.value,
        street: streetInput.value,
        district: districtInput.value,
        subdistrict: subdistrictInput.value,
        province: provinceInput.value,
        zipcode: zipcodeInput.value,
        salary: salaryInput.value
      };
      // Perform data storage or AJAX request here
      
      // Clear form fields (optional)
      firstNameInput.value = '';
      lastNameInput.value = '';
      emailInput.value = '';
      passwordInput.value = '';
      confirmPasswordInput.value = '';
  
      // Redirect to Book Rental Shop page
      window.location.href = '../html/mainshop.html'; // Fix the URL path
    } else {
      // Form validation failed
      console.error('Please fix the errors in the form.');
    }
});
