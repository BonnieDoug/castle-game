# GAME MANAGER

### THE GAME 

There are three types of buildings in this game:

- Castle
    - The Castle has a lifespan of 100 Hit Points.
    - When the Castle is hit, 10 Hit Points are deducted from it's lifespan.
    - If/When the Castle has run out of Hit Points, the city is taken regardless 
    of the state of the other buildings
    - There is only 1 Castle.
- House
    - Houses have a lifespan of 75 Hit Points.
    - When a House is hit, 20 Hit Points are deducted from it's lifespan.
    - There are 4 Houses.
- Farm
    - Farms have a lifespan of 50 Hit Points.
    - When a Farm is hit, 25 Hit Points are deducted from it's lifespan.
    - There are 4 Farms.

- Gameplay:

    - To play, a user is able to attack a random building.
    - The selection of a building is random.
    - Trebuchets are old and not too accurate tools therefore leave 10% chance for 
    missing the target in any given attack.
    - The result of each attack need to be displayed. (which building it hit/ missed)
    - When all the buildings destroyed, a success message is shown.

### INSTRUCTIONS 

The foundations of the game have been done for you, albeit with one or two errors for 
you to find ;) Using session management to store the state, and routing to manage the game, 
the objective is to create a game manager that lets you start new games, view the status 
of your games, and launch an attack on an existing game that has not finished.

### USEFUL RESOURCES

http://symfony.com/doc/current/components/http_foundation/sessions.html
https://silex.symfony.com/doc/2.0/usage.html

### QUESTIONS

- Pretend that the content of the libraries folder is libraries that you created and 
would pull in as vendors. think about what the potential problems you should expect 
when using "LIB\BuildingAction\BuildingActions" briefly explain the issue and provide 
1-2 ways to fix it (also implement 1 if you can)

- If you wanted to host this online how would you make the application more secure just 
by changing one thing in the file structure

### ANSWERS

Please submit any answers to questions here 

1.
     1. `LIB\` isn't an specific enough name to guarantee there will never be a namespace clash with other vendors. Should use something more unique such as `Sport80\` 
     2. `BuildingAction` is a little specific for a directory. It would be better to rename to `Actions` which could then contain all 'Actions'

2. The FrontController `test.php` (now index.php) is in the public root of the application, this allows all vendor & other source files to be accessible. I would (have) created a public directory to contain all public assets + front controller. Removing direct access to the source files. 
   In the real world I would have used the server's vitual host files to set the public directory to `public/` for this test I have simply used a .htaccess for the same result.

### BONUS POINTS

- Add a Dockerfile that allows us to run the application with just one docker command

- Docker
- - `sudo docker build   --file .docker/Dockerfile   -t castle-game .`
- - Build & Run: `docker-compose up --build`
### SUBMITTING RESULTS 

Create a git archive of the project and send that to us as your solution with only the 
necessary files in it.
 


# my-app

## Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Run your tests
```
npm run test
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).

