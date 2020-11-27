# age-test-micro

### Installation

```
cd docker && docker-compose up -d
```
```
composer install
```
```
npm install && npm run watch
```
```
Copy over the .env.example to .env (you may need to set the DB host to localhost).
```

### Running a server
```
composer start
```

### Running tests
```
composer test
```


#### Summary

I chose to use the following technologies in this project. 

 - **Slim 4**: I chose this over Laravel or another fullstack MVC framework as I didn't need the majority of components, just the DI, request and response lifecycles.
 I added custom components such as Eloquent for database interaction.
 
 - **Blade and Alpine JS**: I chose to use blade as the templating engine as I am more comfortable with this. I initially went down the Vue route but decided to use
 alpine js as this doesn't require a separate framework with webpack and transpiling. Alpine has a lot of Vue-like methods and is very pleasant to use in HTML.
 
 - **Tailwind CSS**: I really like Tailwind and champion it when I can. There is something satisfying and flowing with CSS as an API (unusual concept I know).
 
 - **Docker**: This is pretty standard and is used to deploy a database with an entries table already included.
 
 I look forward to discussing and answering any questions regarding my implementation further. 
