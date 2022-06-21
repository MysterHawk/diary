import { Grid, html } from "gridjs";

fetch('/api/houses', {
    headers: {
        accept: 'application/json'
    }
})
    .then(response => response.json())
    .then(data => {
        console.log(data);

        const grid = new Grid({
            sort: true,
            search: true,
            pagination: true,
            columns: [{
                id: 'id',
                name: 'ID',
                formatter: (cell) => { return html(`<a href='/house/${cell}' target=”_blank” rel=”noopener noreferrer”>${cell}</a>`) }
            }, {
                id: 'name',
                name: 'Name'
            }, {
                id: 'fk_location',
                name: 'Address',
                formatter: (cell) => { return html(`<a href='/location/${cell}' target=”_blank” rel=”noopener noreferrer”>${cell}</a>`) }
            },
            {
                id: 'fk_contact',
                name: 'Contact',
                formatter: (cell) => { return html(`<a href='/contact/${cell}' target=”_blank” rel=”noopener noreferrer”>${cell}</a>`) }
            },
            {
                id: 'size',
                name: 'Room size',
                formatter: (cell) => { return html(`${cell}m²`) }
            },
            {
                id: 'rating',
                name: 'Rating'
            },
            {
                id: 'monthly_cost',
                name: 'Monthly cost'
            }, {
                id: 'extra_costs',
                name: 'Extra costs'
            }, {
                id: 'guarantee',
                name: 'Guarantee'
            }, {
                id: 'annualCost',
                name: 'Annual cost'
            }, {
                id: 'url',
                name: 'Url',
                formatter: (cell) => {
                    return html(`<a href='${cell}' target=”_blank” rel=”noopener noreferrer”>Link</a>`)
                }
            }],
            data: data
        }).render(document.getElementById("wrapper"));
    })