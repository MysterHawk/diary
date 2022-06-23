// function to get quote of the moment
async function getQuote() {
  // TODO probably in the future I will have to write a service for it
  const response = await fetch('https://stoic-server.herokuapp.com/random');

  const data = await response.json();

  // console.log(data);

  // write the data inside html
  document.getElementsByTagName('blockquote')[0].innerHTML = data[0].body;
  document.getElementsByTagName('figcaption')[0].innerHTML = `<figcaption>- 
  ${data[0].author}, <cite>${data[0].quotesource}</cite></figcaption>`;
}

getQuote();
