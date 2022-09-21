<?php
/**
 * Parent repository class. Provides a very basic, fluent interface to interact
 * with query
 *
 * @package Studiometa
 */

namespace Studiometa\Repositories;

/** Class */
abstract class Repository {
	/**
	 * List of posts.
	 *
	 * @var mixed[]
	 */
	private $result_set = array();

	/**
	 * Returns an array of posts.
	 *
	 * @return mixed[]
	 */
	public function get() {
		return $this->result_set;
	}

	/**
	 * Returns the first item in a collection. Returns null if there are 0 items in
	 * the collection.
	 *
	 * @return mixed
	 */
	public function first() {
		$local_array = $this->get();
		return isset( $local_array[0] ) ? $local_array[0] : null;
	}

	/**
	 * Runs a query.
	 *
	 * @param mixed[] $params Query params.
	 *
	 * @return Repository
	 */
	protected function query( array $params ) {
		// Clear old result sets.
		$this->reset();

		$cache_key = __FUNCTION__ . md5( http_build_query( $params ) );

		/**
		 * Cached results.
		 *
		 * @var mixed[]
		 */
		$cached_results = wp_cache_get( $cache_key, __CLASS__ );

		if ( false !== $cached_results && count( $cached_results ) > 0 ) {
			// Use cached results.
			return $this->result_set( $cached_results );
		}

		$results = $this->do_query( $params );

		// Cache our results.
		if ( count( $results ) > 0 ) {
			wp_cache_set( $cache_key, $results, __CLASS__ );
		}

		return $this->result_set( $results );
	}

	/**
	 * Function to implement when extendding the Repository.
	 *
	 * Define the query the Repository will run.
	 *
	 * @param mixed[] $params Query params.
	 * @return mixed[]
	 *
	 * @example ./app/Repositories/PostRepository.php How to implement do_query().
	 */
	abstract protected function do_query( $params );

	/**
	 * Clears the current result set.
	 *
	 * @return Repository
	 */
	protected function reset() {
		$this->result_set = array();
		return $this;
	}

	/**
	 * Returns current result set
	 *
	 * @param mixed[] $result_set Result set.
	 *
	 * @return Repository
	 */
	protected function result_set( $result_set ) {
		$this->result_set = $result_set;
		return $this;
	}

}
