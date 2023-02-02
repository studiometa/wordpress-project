# Models

Create one file for each post type to add custom functionality by extending the TimberPost object.
### Exemple: 
Automatically update the data you receive when getting a `Posttype` from the database.
Inside the Model class you can access all post metadata with `$this`.

```php
// Posttype.php
<?php
/**
 * Additional functionality for extending the TimberPost object.
 *
 * @package Studiometa
 * @subpackage Models
 */

namespace Studiometa\Models;

use Timber\Post as TimberPost;

/** Class */
class Posttype extends TimberPost {
	public $_hero;

	public function hero() {
		return array(
			'title'    => $this->post_title,
			'surtitle' => $this->meta( 'hero_surtitle' ),
		);
	}
}

// single-posttype.php
$post = new \Studiometa\Models\Posttype();
var_dump( $post->hero );
// Will return array( 'title' => '...', 'surtitle' => '...' );
```
