<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 2019-07-22
 * Time: 21:08
 */

namespace GaryBot\Collection;
use Countable;
use Exception;
use ArrayAccess;
use Traversable;
use ArrayIterator;
use CachingIterator;
use JsonSerializable;

class Collection implements ArrayAccess, Countable, JsonSerializable
{

	/**
	 * The items contained in the collection.
	 *
	 * @var array
	 */
	protected $items = [];

	/**
	 * Create a new collection.
	 *
	 * @param  mixed  $items
	 * @return void
	 */
	public function __construct($items = [])
	{
		$this->items = $this->getArrayableItems($items);
	}


	/**
	 * Get an item at a given offset.
	 *
	 * @param  mixed  $key
	 * @return mixed
	 */
	public function offsetGet($key)
	{
		return $this->items[$key];
	}

	/**
	 * Set the item at a given offset.
	 *
	 * @param  mixed  $key
	 * @param  mixed  $value
	 * @return void
	 */
	public function offsetSet($key, $value)
	{
		if (is_null($key)) {
			$this->items[] = $value;
		} else {
			$this->items[$key] = $value;
		}
	}

	/**
	 * Get all of the items in the collection.
	 *
	 * @return array
	 */
	public function all()
	{
		return $this->items;
	}

	/**
	 * Count the number of items in the collection.
	 *
	 * @return int
	 */
	public function count()
	{
		return count($this->items);
	}


	/**
	 * Convert the object into something JSON serializable.
	 *
	 * @return array
	 */
	public function jsonSerialize()
	{
		return array_map(function ($value) {
			if ($value instanceof JsonSerializable) {
				return $value->jsonSerialize();
			}

			return $value;
		}, $this->items);
	}

	/**
	 * Determine if an item exists at an offset.
	 *
	 * @param  mixed  $key
	 * @return bool
	 */
	public function offsetExists($key)
	{
		return array_key_exists($key, $this->items);
	}

	/**
	 * Unset the item at a given offset.
	 *
	 * @param  string  $key
	 * @return void
	 */
	public function offsetUnset($key)
	{
		unset($this->items[$key]);
	}

	/**
	 * Results array of items from Collection or Arrayable.
	 * TODO use : php-ds.
	 * @param  mixed  $items
	 * @return array
	 */
	protected function getArrayableItems($items)
	{
		if (is_array($items)) {
			return $items;
		} elseif ($items instanceof self) {
			return $items->all();
		} elseif ($items instanceof Arrayable) {
			return $items->toArray();
		} elseif ($items instanceof Jsonable) {
			return json_decode($items->toJson(), true);
		} elseif ($items instanceof JsonSerializable) {
			return $items->jsonSerialize();
		} elseif ($items instanceof Traversable) {
			return iterator_to_array($items);
		}

		return (array) $items;
	}

	/**
	 * Create a new collection instance if the value isn't one already.
	 *
	 * @param  mixed  $items
	 * @return static
	 */
	public static function make($items = [])
	{
		return new static($items);
	}


}
