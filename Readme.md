# Dashboard Api

Je souhaiter avoir un petit dashboard pour aficher certaine information nécessaire, pour eviter de chercher dans mes favoris

## Tech Stack
**Back:** Symfony
**Front:** Bootstrap

## Installation

Install my-project with github

```bash
  git clone https://github.com/Grezor/Dashboard-API.git
  cd my-project
  composer install
  composer update
```
    
## Environment Variables

To use this project, you will need to add the following environment variables to your .env.local file

`API_KEY_GITHUB`

`API_KEY_DEVTO`

```bash
API_KEY_GITHUB=""
```
## Links API
```https://developers.forem.com/api/``` => dev.to

```https://docs.github.com/en/rest``` => github.com

## API Reference

#### Get all reading list

```
  GET /readinglist?username={username}&per_page=100
```
[more infos](https://developers.forem.com/api/#operation/getReadinglist)
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `API_KEY_DEVTO` | `string` | **Required**. Your API key |

#### Get stars github

```
  GET /users/{username}/starred?&per_page=100
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `API_KEY_DEVTO` | `string` | **Required**. Your API key |
| `username`      | `string` | **Required**. Your username github |

## Documentation
```
comming soon : wiki page
```
## Demo
```
When the project is stable it will be possible to see it
```

## Features

- Light/dark mode toggle
- Live previews