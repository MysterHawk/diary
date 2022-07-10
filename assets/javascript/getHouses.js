import { Grid, html } from 'gridjs';

fetch('/api/houses/listings/300', {
  headers: {
    accept: 'application/json',
  },
})
  .then((response) => response.json())
  .then((data) => {
    console.log(data);

    new Grid({
      sort: true,
      search: true,
      pagination: {
        enabled: true,
        limit: 50,
      },
      columns: [{
        id: 'id',
        name: 'ID',
        formatter: (cell) => html(`<a href='/house/${cell}' target=”_blank” rel=”noopener noreferrer”>${cell}</a>`),
      }, {
        id: 'name',
        name: 'Name',
      },
      {
        id: 'fk_location',
        name: 'fk_location',
        hidden: true,
      },
      {
        id: 'address',
        name: 'Address',
        formatter: (cell, row) => html(`<a href='/location/${row.cells[2].data}' target=”_blank” rel=”noopener noreferrer”>${cell}</a>`),
      },
      {
        id: 'fk_contact',
        name: 'fk_contact',
        hidden: true,
      },
      {
        id: 'contact',
        name: 'Contact',
        formatter: (cell, row) => html(`<a href='/contact/${row.cells[4].data}' target=”_blank” rel=”noopener noreferrer”>${cell}</a>`),
      },
      {
        id: 'size',
        name: 'Room size',
        formatter: (cell) => html(`${cell}m²`),
      },
      {
        id: 'rating',
        name: 'Rating',
      },
      {
        id: 'monthly_cost',
        name: 'Monthly cost',
        formatter: (cell) => html(`${cell}€`),
      }, {
        id: 'extra_costs',
        name: 'Extra costs',
        formatter: (cell) => html(`${cell}€`),
      }, {
        id: 'guarantee',
        name: 'Guarantee',
        formatter: (cell) => html(`${cell}€`),
      }, {
        id: 'annual_cost',
        name: 'Annual cost',
        formatter: (cell) => html(`${cell}€`),
      }, {
        id: 'url',
        name: 'Url',
        formatter: (cell) => html(`<a href='${cell}' target=”_blank” rel=”noopener noreferrer”>Link</a>`),
      }],
      data,
    }).render(document.getElementById('wrapper'));
  });
