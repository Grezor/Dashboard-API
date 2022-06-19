# Dashboard Api

I would like to have a small dashboard to display some necessary information, to avoid searching in my favorites. 
To centralize all my information to be able to search them more quickly

## Technologies
- Symfony 5
- Bootstrap
- PHP 7 or 8

## Installation
```bash
  git clone https://github.com/Grezor/Dashboard-API.git
  cd my-project
  composer install
  composer update
```

## Start Project 
```bash
symfony server:start
symfony server:stop
```
## Environment Variables

To use this project, you will need to add the following environment variables to your .env.local file. For Symfony and Dev.to pages

```bash
.env

API_KEY_GITHUB=""
API_KEY_DEVTO=""
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
```comming soon```

## Features
```comming soon```
## Pages : 
### Pages Dev to
| Route   |      Description      |  
|----------|:-------------:|
| `/starsdevto` |  My favorite articles from dev.to |  
| `/feeddevto` | |
| `/rssdevto` |  |

### Pages Github
| Route   |      Description      |
|----------|:-------------:|
| `/changelog` | Lists all github blog posts |
| `/issues` | Lists my issues on all my projects  |
| `/stars` | List my favorite repositories |
| `/repository` | List my github repositories  |

### Pages Symfony
| Route   |      Description      |
|----------|:-------------:|
| `/blog-symfony` | Lists all Symfony blog posts  |

## Licence

## Contact
Created by [@Grezor](https://www.duplessigeoffrey.fr/) - feel free to contact me!