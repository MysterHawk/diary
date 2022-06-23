# Diary

This project is a digital diary that I'm building to organize my life.

It still in WIP but with the time I will add the functionality needed.

## Tech Stack

**Client:** water.css, gridjs

**Server:** PHP, Symfony 6, API Platform

This project is written in PHP 8.1, the following PHP extensions are required:

- pdo_sqlite
- sqlite3
- sodium

## Screenshots

![Homepage](https://raw.githubusercontent.com/MysterHawk/diary/main/docs/img/home_page.png)

![Houses in Antwerp](https://raw.githubusercontent.com/MysterHawk/diary/main/docs/img/houses_in_antwerp.png)

![Create house](https://raw.githubusercontent.com/MysterHawk/diary/main/docs/img/create_house.png)


## Features

- A personal digital diary to take notes of things
- Dark/Light theme


## Environment Variables available

`DATABASE_URL` change it to use a different connection


## Installation


```bash
  git clone [repo] diary
  cd diary
  # install php libraries
  composer install
  # Create the db
  php bin/console doctrine:database:create
  # Create a .sql to fill the db
  php bin/console make:migration
  # Execute the .sql to fill the db
  php bin/console doctrine:migrations:migrate
  # Install nodejs libraries
  yarn install
  # and build the front-end
  yarn build (or `yarn watch` during development)
```
    
## Contributing

Contributions are always welcome!

See `contributing.md` for ways to get started.

Please adhere to this project's `code of conduct`.


## Running Tests

To run tests, run the following command

```bash
  npm run test
```


## Documentation

[Documentation](https://linktodocumentation)


## FAQ

#### Question 1

Answer 1

#### Question 2

Answer 2


## Feedback

If you have any feedback, please reach out to us at fake@fake.com


## Support

For support, email fake@fake.com or join our Slack channel.


## Acknowledgements

 - [Awesome Readme Templates](https://awesomeopensource.com/project/elangosundar/awesome-README-templates)
 - [Awesome README](https://github.com/matiassingers/awesome-readme)
 - [How to write a Good readme](https://bulldogjob.com/news/449-how-to-write-a-good-readme-for-your-github-project)


## License

[ISC](https://choosealicense.com/licenses/isc/)

