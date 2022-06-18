// this function is needed to calculate the annual cost
function getAnnualCost(monthlyCost, extraCosts, guarantee) {
    return (monthlyCost + extraCosts) * 12 + guarantee;
}

// this function is needed to search the contact information and autofill parts of the form
function searchContact(type, value) {
    if (value === '') {
        console.log("ℹ️ There isn't a input exit..");
        return false;
    }

    // the input have the same name of the value types
    // so I can use them directly to generate the url to call the api
    fetch(`/api/contacts?${type}=${value}`, {
        headers: {
            accept: 'application/json',
        },
    })
        .then((response) => response.json())
        .then((data) => {
            // console.log(data);

            if (data.length > 1) {
                console.warn("⚠️ Error, I've found more than 1 contact!");
                return false;
            }

            if (data[0]) {
                document.getElementById('id_contact').value = data[0].id;
                document.getElementById('name').value = data[0].name;
                document.getElementById('surname').value = data[0].surname;
                document.getElementById('email').value = data[0].email;
                document.getElementById('phone').value = data[0].phone;
                console.log('✅ Contact found!');

                return true;
            }

            console.log('ℹ️ Contact not found!');
            return false;
        });
    return false;
}

// this function is needed to search the location information and autofill parts of the form
function searchLocation(value) {
    if (value === '') {
        console.log("ℹ️ There isn't a input exit..");
        return false;
    }

    fetch(`/api/locations?address=${value}`, {
        headers: {
            accept: 'application/json',
        },
    })
        .then((response) => response.json())
        .then((data) => {
            // console.log(data);

            if (data.length > 1) {
                console.warn("⚠️ Error, I've found more than 1 location!");
                return false;
            }

            if (data[0]) {
                document.getElementById('id_location').value = data[0].id;
                document.getElementById('address').value = data[0].address;
                document.getElementById('address_number').value = data[0].address_number;
                document.getElementById('zip_code').value = data[0].zip_code;
                console.log('✅ Location found!');

                return true;
            }

            console.log('ℹ️ Location not found!');
            return false;
        });
    return false;
}

// this function help to create house entities
function createHouse(formData) {
    const object = {};

    object.name = formData.get('house_name');
    object.url = formData.get('url');
    object.monthlyCost = parseInt(formData.get('monthly_cost'), 10);
    object.extraCosts = parseInt(formData.get('extra_costs'), 10);
    object.guarantee = parseInt(formData.get('guarantee'), 10);
    object.annualCost = parseInt(formData.get('annual_cost'), 10);
    object.note = formData.get('note');
    object.rating = parseInt(formData.get('rating'), 10);
    object.fkContact = parseInt(formData.get('id_contact'), 10);
    object.fkLocation = parseInt(formData.get('id_location'), 10);

    const json = JSON.stringify(object);

    fetch('/api/houses', {
        method: 'POST',
        body: json,
        headers: {
            accept: 'application/json',
            'Content-Type': 'application/json',
        },
    })
        .then((response) => response.json())
        .then((data) => {
            // console.log(data);

            if (data.id) {
                console.log('✅ House created!');
                alert('House created!');
            } else {
                console.error('⚠️ There was an error during the creation of the house...');
                console.log(data);
                alert('There was an error with the request...');
            }
        });
}
// this function help to create location enitities
function createLocation(formData) {
    const object = {};

    object.address = formData.get('address');
    object.addressNumber = parseInt(formData.get('address_number'), 10);
    object.zipCode = parseInt(formData.get('zip_code'), 10);

    const json = JSON.stringify(object);

    fetch('/api/locations', {
        method: 'POST',
        body: json,
        headers: {
            accept: 'application/json',
            'Content-Type': 'application/json',
        },
    })
        .then((response) => response.json())
        .then((data) => {
            // console.log(data);

            if (data.id) {
                console.log('✅ Location created!');
                // write the id of the new element inside the input hidden
                document.getElementById('id_location').value = data.id;
                alert('Location created!');
            } else {
                console.error('⚠️ There was an error during the creation of the location...');
                console.log(data);
                alert('There was an error with the request...');
            }
        });
}

// this function help to create contact enitities
function createContact(formData) {
    const object = {};

    object.name = formData.get('name');
    object.surname = formData.get('surname');
    object.email = formData.get('email');
    object.phone = parseInt(formData.get('phone'), 10);

    const json = JSON.stringify(object);

    fetch('/api/contacts', {
        method: 'POST',
        body: json,
        headers: {
            accept: 'application/json',
            'Content-Type': 'application/json',
        },
    })
        .then((response) => response.json())
        .then((data) => {
            // console.log(data);

            if (data.id) {
                console.log('✅ Contact created!');
                // write the id of the new element inside the input hidden
                document.getElementById('id_contact').value = data.id;
                alert('Contact created!');
            } else {
                console.error('⚠️ There was an error during the creation of the contact...');
                console.log(data);
                alert('There was an error with the request...');
            }
        });
}

window.onload = () => {
    // I intercept the form submit to call the api to create house/location/address
    const form = document.getElementById('formCreateHouse');
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const formData = new FormData(form);

        // Display the key/value pairs
        // for (var pair of formData.entries()) {
        //     console.log(pair[0] + ', ' + pair[1]);
        // }

        // create the house!
        createHouse(formData);
    });

    // I get all the input that have cost in them
    const costs = document.querySelectorAll('.cost');
    const inputAnnualCost = document.getElementById('annual_cost');

    // and I calculate the annual cost
    costs.forEach((cost) => {
        cost.addEventListener('change', () => {
            const inputMonthlyCost = document.getElementById('monthly_cost');
            const inputExtraCosts = document.getElementById('extra_costs');
            const inputGuarantee = document.getElementById('guarantee');

            inputAnnualCost.value = getAnnualCost(
                parseInt(inputMonthlyCost.value, 10),
                parseInt(inputExtraCosts.value, 10),
                parseInt(inputGuarantee.value, 10),
            );
        });
    });

    // I get all the input that can search on the db for the contact information
    const inputSearchContacts = document.querySelectorAll('.searchContact');

    // and If I found results I autofill contact input
    inputSearchContacts.forEach((input) => {
        input.addEventListener('blur', () => {
            searchContact(input.id, input.value);
        });
    });

    const inputCreateContact = document.querySelectorAll('.createContact');

    const inputHiddenIdContact = document.getElementById('id_contact');
    const inputName = document.getElementById('name');
    const inputSurname = document.getElementById('surname');
    const inputEmail = document.getElementById('email');
    const inputPhone = document.getElementById('phone');

    // create contact if it doesnt exist
    inputCreateContact.forEach((input) => {
        input.addEventListener('blur', () => {
            // if there isnt already a contact and the other inputs are complete
            // create the contact
            if (!inputHiddenIdContact.value && inputName.value !== '' && inputSurname.value !== '' && inputEmail.value !== '' && inputPhone.value) {
                createContact(new FormData(form));
            } else { console.log('ℹ️ Cannot create contact because some data is missing or a contact already exist'); }
        });
    });

    // autofill location details if already exist
    const inputHiddenIdLocation = document.getElementById('id_location');
    const inputAddress = document.getElementById('address');
    const inputAddressNumber = document.getElementById('address_number');
    const inputZipCode = document.getElementById('zip_code');

    inputAddress.addEventListener('blur', () => {
        searchLocation(inputAddress.value);
    });

    const inputCreateLocation = document.querySelectorAll('.createLocation');

    // create location if doesnt exist
    inputCreateLocation.forEach((input) => {
        input.addEventListener('blur', () => {
            // if there isnt already a location and the other inputs are complete
            // create the location
            if (!inputHiddenIdLocation.value && inputAddress.value !== '' && inputAddressNumber.value && inputZipCode.value) {
                createLocation(new FormData(form));
            } else { console.log('ℹ️ Cannot create location because some data is missing or a location already exist'); }
        });
    });
};

