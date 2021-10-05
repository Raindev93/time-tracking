## Time tracking app

## Installation

- clone repository: 
``` git clone git@github.com:Raindev93/time-tracking.git ```
- navigate to the application's directory
- execute the following command: 
```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```
- copy ```.env.example``` file to ```.env``` and fill required data
- start sail ```./vendor/bin/sail up```
