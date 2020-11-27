const dobInput = document.querySelector('#dob');
flatpickr(dobInput, {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    maxDate: '2006-12-31'
});
