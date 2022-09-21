# Repositories

- Use Repositories to add query related logic. 
- All Repositories should extend the base `Repository` class. 
- All Repositories query functions has to `return $this->query( $params );` because `$this->query` is adding cache to the request by default.


## Example
```php
use Studiometa\Repositories\PostRepository;

// Get the 10 latest posts
$post_repo        = new PostRepository();
$context['posts'] = $post_repo->latest_posts(10)->get();

// Full list of available arguments
$context['posts'] = $post_repo->latest_posts($limit, $post_types, $exclude_posts, $paged)->get();
```
