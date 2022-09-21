<?php
/**
 * Repository entity for retrieving post type objects.
 *
 * @package Studiometa
 */

namespace Studiometa\Repositories;

use Timber\PostQuery;

/** Class */
class PostRepository extends Repository {
	const CLASS_TYPE = '\Timber\Post';
	const POST_TYPES = array( 'post' ); // Main post types.

	/**
	 * Implement do_query.
	 *
	 * @param mixed[] $params for the query.
	 * @return \Timber\PostQuery
	 * @phpstan-ignore-next-line
	 */
	public function do_query( $params ) {
		return new PostQuery( $params, static::CLASS_TYPE );
	}

	/**
	 * Returns a chronological list of latest "Post" (articles) posts for a given
	 * category. Default $limit is 10.
	 *
	 * @param string|string[] $slug    Slug.
	 * @param integer         $limit   Number to return (optional).
	 * @param mixed[]         $exclude Posts to exclude (optional).
	 * @param integer         $paged   Enable pagination (optional).
	 *
	 * @return Repository
	 */
	public function posts_by_category_slug( $slug, $limit = 10, $exclude = array(), $paged = 0 ) {

		// Set sane defaults so we don't do full table scans.
		if ( $limit <= 0 || $limit > 100 ) {
			// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error
			trigger_error( __CLASS__ . ' ' . __FUNCTION__ . ' : $limit parameter should not be over 100 to avoid full sql table scans', E_USER_WARNING );
			$limit = 100;
		}

		// Note the + symbol. See https://developer.wordpress.org/reference/classes/wp_query/#category-parameters.
		if ( is_array( $slug ) ) {
			$slug = implode( '+', $slug );
		}

		$params = array(
			'posts_per_page' => (int) $limit,
			'category_name'  => $slug,
			'post_type'      => self::POST_TYPES,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		if ( is_array( $exclude ) && count( $exclude ) > 0 ) {
			$params['post__not_in'] = $exclude;
		}

		if ( (int) $paged > 0 ) {
			$params['paged'] = $paged;
		}

		return $this->query( $params );
	}

	/**
	 * Returns a chronological list of latest posts across all *public* post types.
	 * This acts as a "firehose" of new content so to speak.
	 *
	 * @param integer $limit      Number of posts to return.
	 * @param mixed[] $exclude    IDs of posts to exclude.
	 * @param integer $paged      Enable pagination.
	 *
	 * @return Repository
	 */
	public function latest_posts( $limit = 10, array $exclude = array(), $paged = 0 ) {

		// Set sane defaults so we don't do full table scans.
		if ( $limit <= 0 || $limit > 100 ) {
			// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error
			trigger_error( __CLASS__ . ' ' . __FUNCTION__ . ' : $limit parameter should not be over 100 to avoid full sql table scans', E_USER_WARNING );
			$limit = 100;
		}

		$params = array(
			'posts_per_page' => (int) $limit,
			'post_type'      => self::POST_TYPES,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		if ( count( $exclude ) > 0 ) {
			$params['post__not_in'] = $exclude;
		}

		if ( (int) $paged > 0 ) {
			$params['paged'] = $paged;
		}

		return $this->query( $params );
	}
}
