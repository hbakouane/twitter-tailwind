## Take-away:

- The models data have to be imported to the search engine indexes through one way of the two
  <br /> <br /> run the command: `php artisan scout:import`
  <br /> <br /> set up a queue for Scout in `config/scout.php` and run it using `php artisan redis queue:work (--queue=scout)`
- We can delete the imported data of a model by using the following command `php artisan scout:flush`
- Note that the queue job updates and syncs record in every interaction with the database, when the `scout:import` command doesn't do that 
<br /><br />
- It's better to use one of the services (Algolia, Milleisearch ...) but for local testing we can use just the database driver, note that the collection driver doesn't provide a good approach to search through records, it uses just the WHERE LIKE closure, the other ones are sofisticated, they use prefix, full-text based indexing...
- We can specify which approach to use while filtering through [#PHP attributes] https://laravel.com/docs/11.x/scout#database-engine
  <br /><br />
- We can import models along with their relationships using a method called `makeAllSearchableUsing(Builder $query) $query->with('relationship');` but we have to note that those relationships are not accessible in the queue job, because a job serializes just the model, not its relationships as well https://laravel.com/docs/11.x/queues#handling-relationships 
