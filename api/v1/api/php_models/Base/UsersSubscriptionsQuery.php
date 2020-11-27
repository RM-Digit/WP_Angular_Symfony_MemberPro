<?php

namespace Base;

use \UsersSubscriptions as ChildUsersSubscriptions;
use \UsersSubscriptionsQuery as ChildUsersSubscriptionsQuery;
use \Exception;
use \PDO;
use Map\UsersSubscriptionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'users_subscriptions' table.
 *
 *
 *
 * @method     ChildUsersSubscriptionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUsersSubscriptionsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildUsersSubscriptionsQuery orderByPackage($order = Criteria::ASC) Order by the package column
 * @method     ChildUsersSubscriptionsQuery orderByIsTrial($order = Criteria::ASC) Order by the is_trial column
 * @method     ChildUsersSubscriptionsQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildUsersSubscriptionsQuery orderByDateTimeExpires($order = Criteria::ASC) Order by the date_time_expires column
 * @method     ChildUsersSubscriptionsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildUsersSubscriptionsQuery orderByWordpressId($order = Criteria::ASC) Order by the wordpress_id column
 *
 * @method     ChildUsersSubscriptionsQuery groupById() Group by the id column
 * @method     ChildUsersSubscriptionsQuery groupByUserId() Group by the user_id column
 * @method     ChildUsersSubscriptionsQuery groupByPackage() Group by the package column
 * @method     ChildUsersSubscriptionsQuery groupByIsTrial() Group by the is_trial column
 * @method     ChildUsersSubscriptionsQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildUsersSubscriptionsQuery groupByDateTimeExpires() Group by the date_time_expires column
 * @method     ChildUsersSubscriptionsQuery groupByStatus() Group by the status column
 * @method     ChildUsersSubscriptionsQuery groupByWordpressId() Group by the wordpress_id column
 *
 * @method     ChildUsersSubscriptionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUsersSubscriptionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUsersSubscriptionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUsersSubscriptionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUsersSubscriptionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUsersSubscriptionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUsersSubscriptions findOne(ConnectionInterface $con = null) Return the first ChildUsersSubscriptions matching the query
 * @method     ChildUsersSubscriptions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUsersSubscriptions matching the query, or a new ChildUsersSubscriptions object populated from the query conditions when no match is found
 *
 * @method     ChildUsersSubscriptions findOneById(int $id) Return the first ChildUsersSubscriptions filtered by the id column
 * @method     ChildUsersSubscriptions findOneByUserId(int $user_id) Return the first ChildUsersSubscriptions filtered by the user_id column
 * @method     ChildUsersSubscriptions findOneByPackage(string $package) Return the first ChildUsersSubscriptions filtered by the package column
 * @method     ChildUsersSubscriptions findOneByIsTrial(int $is_trial) Return the first ChildUsersSubscriptions filtered by the is_trial column
 * @method     ChildUsersSubscriptions findOneByDateTimeCreated(string $date_time_created) Return the first ChildUsersSubscriptions filtered by the date_time_created column
 * @method     ChildUsersSubscriptions findOneByDateTimeExpires(string $date_time_expires) Return the first ChildUsersSubscriptions filtered by the date_time_expires column
 * @method     ChildUsersSubscriptions findOneByStatus(string $status) Return the first ChildUsersSubscriptions filtered by the status column
 * @method     ChildUsersSubscriptions findOneByWordpressId(int $wordpress_id) Return the first ChildUsersSubscriptions filtered by the wordpress_id column *

 * @method     ChildUsersSubscriptions requirePk($key, ConnectionInterface $con = null) Return the ChildUsersSubscriptions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersSubscriptions requireOne(ConnectionInterface $con = null) Return the first ChildUsersSubscriptions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsersSubscriptions requireOneById(int $id) Return the first ChildUsersSubscriptions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersSubscriptions requireOneByUserId(int $user_id) Return the first ChildUsersSubscriptions filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersSubscriptions requireOneByPackage(string $package) Return the first ChildUsersSubscriptions filtered by the package column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersSubscriptions requireOneByIsTrial(int $is_trial) Return the first ChildUsersSubscriptions filtered by the is_trial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersSubscriptions requireOneByDateTimeCreated(string $date_time_created) Return the first ChildUsersSubscriptions filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersSubscriptions requireOneByDateTimeExpires(string $date_time_expires) Return the first ChildUsersSubscriptions filtered by the date_time_expires column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersSubscriptions requireOneByStatus(string $status) Return the first ChildUsersSubscriptions filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersSubscriptions requireOneByWordpressId(int $wordpress_id) Return the first ChildUsersSubscriptions filtered by the wordpress_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsersSubscriptions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUsersSubscriptions objects based on current ModelCriteria
 * @method     ChildUsersSubscriptions[]|ObjectCollection findById(int $id) Return ChildUsersSubscriptions objects filtered by the id column
 * @method     ChildUsersSubscriptions[]|ObjectCollection findByUserId(int $user_id) Return ChildUsersSubscriptions objects filtered by the user_id column
 * @method     ChildUsersSubscriptions[]|ObjectCollection findByPackage(string $package) Return ChildUsersSubscriptions objects filtered by the package column
 * @method     ChildUsersSubscriptions[]|ObjectCollection findByIsTrial(int $is_trial) Return ChildUsersSubscriptions objects filtered by the is_trial column
 * @method     ChildUsersSubscriptions[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildUsersSubscriptions objects filtered by the date_time_created column
 * @method     ChildUsersSubscriptions[]|ObjectCollection findByDateTimeExpires(string $date_time_expires) Return ChildUsersSubscriptions objects filtered by the date_time_expires column
 * @method     ChildUsersSubscriptions[]|ObjectCollection findByStatus(string $status) Return ChildUsersSubscriptions objects filtered by the status column
 * @method     ChildUsersSubscriptions[]|ObjectCollection findByWordpressId(int $wordpress_id) Return ChildUsersSubscriptions objects filtered by the wordpress_id column
 * @method     ChildUsersSubscriptions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UsersSubscriptionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UsersSubscriptionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\UsersSubscriptions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUsersSubscriptionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUsersSubscriptionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUsersSubscriptionsQuery) {
            return $criteria;
        }
        $query = new ChildUsersSubscriptionsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUsersSubscriptions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UsersSubscriptionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UsersSubscriptionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUsersSubscriptions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `user_id`, `package`, `is_trial`, `date_time_created`, `date_time_expires`, `status`, `wordpress_id` FROM `users_subscriptions` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUsersSubscriptions $obj */
            $obj = new ChildUsersSubscriptions();
            $obj->hydrate($row);
            UsersSubscriptionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildUsersSubscriptions|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsersSubscriptionsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsersSubscriptionsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersSubscriptionsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersSubscriptionsTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the package column
     *
     * Example usage:
     * <code>
     * $query->filterByPackage('fooValue');   // WHERE package = 'fooValue'
     * $query->filterByPackage('%fooValue%', Criteria::LIKE); // WHERE package LIKE '%fooValue%'
     * </code>
     *
     * @param     string $package The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByPackage($package = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($package)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersSubscriptionsTableMap::COL_PACKAGE, $package, $comparison);
    }

    /**
     * Filter the query on the is_trial column
     *
     * Example usage:
     * <code>
     * $query->filterByIsTrial(1234); // WHERE is_trial = 1234
     * $query->filterByIsTrial(array(12, 34)); // WHERE is_trial IN (12, 34)
     * $query->filterByIsTrial(array('min' => 12)); // WHERE is_trial > 12
     * </code>
     *
     * @param     mixed $isTrial The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByIsTrial($isTrial = null, $comparison = null)
    {
        if (is_array($isTrial)) {
            $useMinMax = false;
            if (isset($isTrial['min'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_IS_TRIAL, $isTrial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isTrial['max'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_IS_TRIAL, $isTrial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersSubscriptionsTableMap::COL_IS_TRIAL, $isTrial, $comparison);
    }

    /**
     * Filter the query on the date_time_created column
     *
     * Example usage:
     * <code>
     * $query->filterByDateTimeCreated('2011-03-14'); // WHERE date_time_created = '2011-03-14'
     * $query->filterByDateTimeCreated('now'); // WHERE date_time_created = '2011-03-14'
     * $query->filterByDateTimeCreated(array('max' => 'yesterday')); // WHERE date_time_created > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateTimeCreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersSubscriptionsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
    }

    /**
     * Filter the query on the date_time_expires column
     *
     * Example usage:
     * <code>
     * $query->filterByDateTimeExpires('2011-03-14'); // WHERE date_time_expires = '2011-03-14'
     * $query->filterByDateTimeExpires('now'); // WHERE date_time_expires = '2011-03-14'
     * $query->filterByDateTimeExpires(array('max' => 'yesterday')); // WHERE date_time_expires > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateTimeExpires The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByDateTimeExpires($dateTimeExpires = null, $comparison = null)
    {
        if (is_array($dateTimeExpires)) {
            $useMinMax = false;
            if (isset($dateTimeExpires['min'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_DATE_TIME_EXPIRES, $dateTimeExpires['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeExpires['max'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_DATE_TIME_EXPIRES, $dateTimeExpires['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersSubscriptionsTableMap::COL_DATE_TIME_EXPIRES, $dateTimeExpires, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersSubscriptionsTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the wordpress_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWordpressId(1234); // WHERE wordpress_id = 1234
     * $query->filterByWordpressId(array(12, 34)); // WHERE wordpress_id IN (12, 34)
     * $query->filterByWordpressId(array('min' => 12)); // WHERE wordpress_id > 12
     * </code>
     *
     * @param     mixed $wordpressId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function filterByWordpressId($wordpressId = null, $comparison = null)
    {
        if (is_array($wordpressId)) {
            $useMinMax = false;
            if (isset($wordpressId['min'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_WORDPRESS_ID, $wordpressId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wordpressId['max'])) {
                $this->addUsingAlias(UsersSubscriptionsTableMap::COL_WORDPRESS_ID, $wordpressId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersSubscriptionsTableMap::COL_WORDPRESS_ID, $wordpressId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUsersSubscriptions $usersSubscriptions Object to remove from the list of results
     *
     * @return $this|ChildUsersSubscriptionsQuery The current query, for fluid interface
     */
    public function prune($usersSubscriptions = null)
    {
        if ($usersSubscriptions) {
            $this->addUsingAlias(UsersSubscriptionsTableMap::COL_ID, $usersSubscriptions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the users_subscriptions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersSubscriptionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsersSubscriptionsTableMap::clearInstancePool();
            UsersSubscriptionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersSubscriptionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UsersSubscriptionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UsersSubscriptionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UsersSubscriptionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UsersSubscriptionsQuery
