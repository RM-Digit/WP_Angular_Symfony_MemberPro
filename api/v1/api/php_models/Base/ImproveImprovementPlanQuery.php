<?php

namespace Base;

use \ImproveImprovementPlan as ChildImproveImprovementPlan;
use \ImproveImprovementPlanQuery as ChildImproveImprovementPlanQuery;
use \Exception;
use \PDO;
use Map\ImproveImprovementPlanTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'improve_improvement_plan' table.
 *
 *
 *
 * @method     ChildImproveImprovementPlanQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildImproveImprovementPlanQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildImproveImprovementPlanQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildImproveImprovementPlanQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildImproveImprovementPlanQuery orderByProcess($order = Criteria::ASC) Order by the process column
 * @method     ChildImproveImprovementPlanQuery orderByGoal($order = Criteria::ASC) Order by the goal column
 * @method     ChildImproveImprovementPlanQuery orderByActionNeeded($order = Criteria::ASC) Order by the action_needed column
 * @method     ChildImproveImprovementPlanQuery orderByResourceResponsible($order = Criteria::ASC) Order by the resource_responsible column
 * @method     ChildImproveImprovementPlanQuery orderByChallenges($order = Criteria::ASC) Order by the challenges column
 * @method     ChildImproveImprovementPlanQuery orderByMeasures($order = Criteria::ASC) Order by the measures column
 * @method     ChildImproveImprovementPlanQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildImproveImprovementPlanQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildImproveImprovementPlanQuery groupById() Group by the id column
 * @method     ChildImproveImprovementPlanQuery groupByProjectId() Group by the project_id column
 * @method     ChildImproveImprovementPlanQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildImproveImprovementPlanQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildImproveImprovementPlanQuery groupByProcess() Group by the process column
 * @method     ChildImproveImprovementPlanQuery groupByGoal() Group by the goal column
 * @method     ChildImproveImprovementPlanQuery groupByActionNeeded() Group by the action_needed column
 * @method     ChildImproveImprovementPlanQuery groupByResourceResponsible() Group by the resource_responsible column
 * @method     ChildImproveImprovementPlanQuery groupByChallenges() Group by the challenges column
 * @method     ChildImproveImprovementPlanQuery groupByMeasures() Group by the measures column
 * @method     ChildImproveImprovementPlanQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildImproveImprovementPlanQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildImproveImprovementPlanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildImproveImprovementPlanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildImproveImprovementPlanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildImproveImprovementPlanQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildImproveImprovementPlanQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildImproveImprovementPlanQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildImproveImprovementPlanQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildImproveImprovementPlanQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildImproveImprovementPlanQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildImproveImprovementPlanQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildImproveImprovementPlanQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildImproveImprovementPlanQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildImproveImprovementPlanQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildImproveImprovementPlanQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildImproveImprovementPlanQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildImproveImprovementPlanQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildImproveImprovementPlanQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildImproveImprovementPlanQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildImproveImprovementPlanQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildImproveImprovementPlanQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildImproveImprovementPlanQuery leftJoinPhaseComponents($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildImproveImprovementPlanQuery rightJoinPhaseComponents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildImproveImprovementPlanQuery innerJoinPhaseComponents($relationAlias = null) Adds a INNER JOIN clause to the query using the PhaseComponents relation
 *
 * @method     ChildImproveImprovementPlanQuery joinWithPhaseComponents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildImproveImprovementPlanQuery leftJoinWithPhaseComponents() Adds a LEFT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildImproveImprovementPlanQuery rightJoinWithPhaseComponents() Adds a RIGHT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildImproveImprovementPlanQuery innerJoinWithPhaseComponents() Adds a INNER JOIN clause and with to the query using the PhaseComponents relation
 *
 * @method     \ProjectsQuery|\ProjectPhasesQuery|\PhaseComponentsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildImproveImprovementPlan findOne(ConnectionInterface $con = null) Return the first ChildImproveImprovementPlan matching the query
 * @method     ChildImproveImprovementPlan findOneOrCreate(ConnectionInterface $con = null) Return the first ChildImproveImprovementPlan matching the query, or a new ChildImproveImprovementPlan object populated from the query conditions when no match is found
 *
 * @method     ChildImproveImprovementPlan findOneById(int $id) Return the first ChildImproveImprovementPlan filtered by the id column
 * @method     ChildImproveImprovementPlan findOneByProjectId(int $project_id) Return the first ChildImproveImprovementPlan filtered by the project_id column
 * @method     ChildImproveImprovementPlan findOneByPhaseId(int $phase_id) Return the first ChildImproveImprovementPlan filtered by the phase_id column
 * @method     ChildImproveImprovementPlan findOneByPhaseComponentId(int $phase_component_id) Return the first ChildImproveImprovementPlan filtered by the phase_component_id column
 * @method     ChildImproveImprovementPlan findOneByProcess(string $process) Return the first ChildImproveImprovementPlan filtered by the process column
 * @method     ChildImproveImprovementPlan findOneByGoal(string $goal) Return the first ChildImproveImprovementPlan filtered by the goal column
 * @method     ChildImproveImprovementPlan findOneByActionNeeded(string $action_needed) Return the first ChildImproveImprovementPlan filtered by the action_needed column
 * @method     ChildImproveImprovementPlan findOneByResourceResponsible(string $resource_responsible) Return the first ChildImproveImprovementPlan filtered by the resource_responsible column
 * @method     ChildImproveImprovementPlan findOneByChallenges(string $challenges) Return the first ChildImproveImprovementPlan filtered by the challenges column
 * @method     ChildImproveImprovementPlan findOneByMeasures(string $measures) Return the first ChildImproveImprovementPlan filtered by the measures column
 * @method     ChildImproveImprovementPlan findOneByDateTimeCreated(string $date_time_created) Return the first ChildImproveImprovementPlan filtered by the date_time_created column
 * @method     ChildImproveImprovementPlan findOneByLastUpdated(string $last_updated) Return the first ChildImproveImprovementPlan filtered by the last_updated column *

 * @method     ChildImproveImprovementPlan requirePk($key, ConnectionInterface $con = null) Return the ChildImproveImprovementPlan by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOne(ConnectionInterface $con = null) Return the first ChildImproveImprovementPlan matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildImproveImprovementPlan requireOneById(int $id) Return the first ChildImproveImprovementPlan filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByProjectId(int $project_id) Return the first ChildImproveImprovementPlan filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByPhaseId(int $phase_id) Return the first ChildImproveImprovementPlan filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildImproveImprovementPlan filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByProcess(string $process) Return the first ChildImproveImprovementPlan filtered by the process column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByGoal(string $goal) Return the first ChildImproveImprovementPlan filtered by the goal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByActionNeeded(string $action_needed) Return the first ChildImproveImprovementPlan filtered by the action_needed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByResourceResponsible(string $resource_responsible) Return the first ChildImproveImprovementPlan filtered by the resource_responsible column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByChallenges(string $challenges) Return the first ChildImproveImprovementPlan filtered by the challenges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByMeasures(string $measures) Return the first ChildImproveImprovementPlan filtered by the measures column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByDateTimeCreated(string $date_time_created) Return the first ChildImproveImprovementPlan filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImproveImprovementPlan requireOneByLastUpdated(string $last_updated) Return the first ChildImproveImprovementPlan filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildImproveImprovementPlan[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildImproveImprovementPlan objects based on current ModelCriteria
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findById(int $id) Return ChildImproveImprovementPlan objects filtered by the id column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByProjectId(int $project_id) Return ChildImproveImprovementPlan objects filtered by the project_id column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildImproveImprovementPlan objects filtered by the phase_id column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildImproveImprovementPlan objects filtered by the phase_component_id column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByProcess(string $process) Return ChildImproveImprovementPlan objects filtered by the process column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByGoal(string $goal) Return ChildImproveImprovementPlan objects filtered by the goal column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByActionNeeded(string $action_needed) Return ChildImproveImprovementPlan objects filtered by the action_needed column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByResourceResponsible(string $resource_responsible) Return ChildImproveImprovementPlan objects filtered by the resource_responsible column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByChallenges(string $challenges) Return ChildImproveImprovementPlan objects filtered by the challenges column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByMeasures(string $measures) Return ChildImproveImprovementPlan objects filtered by the measures column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildImproveImprovementPlan objects filtered by the date_time_created column
 * @method     ChildImproveImprovementPlan[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildImproveImprovementPlan objects filtered by the last_updated column
 * @method     ChildImproveImprovementPlan[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ImproveImprovementPlanQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ImproveImprovementPlanQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ImproveImprovementPlan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildImproveImprovementPlanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildImproveImprovementPlanQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildImproveImprovementPlanQuery) {
            return $criteria;
        }
        $query = new ChildImproveImprovementPlanQuery();
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
     * @return ChildImproveImprovementPlan|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ImproveImprovementPlanTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ImproveImprovementPlanTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildImproveImprovementPlan A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `process`, `goal`, `action_needed`, `resource_responsible`, `challenges`, `measures`, `date_time_created`, `last_updated` FROM `improve_improvement_plan` WHERE `id` = :p0';
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
            /** @var ChildImproveImprovementPlan $obj */
            $obj = new ChildImproveImprovementPlan();
            $obj->hydrate($row);
            ImproveImprovementPlanTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildImproveImprovementPlan|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the project_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectId(1234); // WHERE project_id = 1234
     * $query->filterByProjectId(array(12, 34)); // WHERE project_id IN (12, 34)
     * $query->filterByProjectId(array('min' => 12)); // WHERE project_id > 12
     * </code>
     *
     * @see       filterByProjects()
     *
     * @param     mixed $projectId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_PROJECT_ID, $projectId, $comparison);
    }

    /**
     * Filter the query on the phase_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPhaseId(1234); // WHERE phase_id = 1234
     * $query->filterByPhaseId(array(12, 34)); // WHERE phase_id IN (12, 34)
     * $query->filterByPhaseId(array('min' => 12)); // WHERE phase_id > 12
     * </code>
     *
     * @see       filterByProjectPhases()
     *
     * @param     mixed $phaseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_PHASE_ID, $phaseId, $comparison);
    }

    /**
     * Filter the query on the phase_component_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPhaseComponentId(1234); // WHERE phase_component_id = 1234
     * $query->filterByPhaseComponentId(array(12, 34)); // WHERE phase_component_id IN (12, 34)
     * $query->filterByPhaseComponentId(array('min' => 12)); // WHERE phase_component_id > 12
     * </code>
     *
     * @see       filterByPhaseComponents()
     *
     * @param     mixed $phaseComponentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
    }

    /**
     * Filter the query on the process column
     *
     * Example usage:
     * <code>
     * $query->filterByProcess('fooValue');   // WHERE process = 'fooValue'
     * $query->filterByProcess('%fooValue%', Criteria::LIKE); // WHERE process LIKE '%fooValue%'
     * </code>
     *
     * @param     string $process The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByProcess($process = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($process)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_PROCESS, $process, $comparison);
    }

    /**
     * Filter the query on the goal column
     *
     * Example usage:
     * <code>
     * $query->filterByGoal('fooValue');   // WHERE goal = 'fooValue'
     * $query->filterByGoal('%fooValue%', Criteria::LIKE); // WHERE goal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $goal The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByGoal($goal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($goal)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_GOAL, $goal, $comparison);
    }

    /**
     * Filter the query on the action_needed column
     *
     * Example usage:
     * <code>
     * $query->filterByActionNeeded('fooValue');   // WHERE action_needed = 'fooValue'
     * $query->filterByActionNeeded('%fooValue%', Criteria::LIKE); // WHERE action_needed LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actionNeeded The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByActionNeeded($actionNeeded = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionNeeded)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_ACTION_NEEDED, $actionNeeded, $comparison);
    }

    /**
     * Filter the query on the resource_responsible column
     *
     * Example usage:
     * <code>
     * $query->filterByResourceResponsible('fooValue');   // WHERE resource_responsible = 'fooValue'
     * $query->filterByResourceResponsible('%fooValue%', Criteria::LIKE); // WHERE resource_responsible LIKE '%fooValue%'
     * </code>
     *
     * @param     string $resourceResponsible The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByResourceResponsible($resourceResponsible = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($resourceResponsible)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_RESOURCE_RESPONSIBLE, $resourceResponsible, $comparison);
    }

    /**
     * Filter the query on the challenges column
     *
     * Example usage:
     * <code>
     * $query->filterByChallenges('fooValue');   // WHERE challenges = 'fooValue'
     * $query->filterByChallenges('%fooValue%', Criteria::LIKE); // WHERE challenges LIKE '%fooValue%'
     * </code>
     *
     * @param     string $challenges The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByChallenges($challenges = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($challenges)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_CHALLENGES, $challenges, $comparison);
    }

    /**
     * Filter the query on the measures column
     *
     * Example usage:
     * <code>
     * $query->filterByMeasures('fooValue');   // WHERE measures = 'fooValue'
     * $query->filterByMeasures('%fooValue%', Criteria::LIKE); // WHERE measures LIKE '%fooValue%'
     * </code>
     *
     * @param     string $measures The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByMeasures($measures = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($measures)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_MEASURES, $measures, $comparison);
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
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
    }

    /**
     * Filter the query on the last_updated column
     *
     * Example usage:
     * <code>
     * $query->filterByLastUpdated('2011-03-14'); // WHERE last_updated = '2011-03-14'
     * $query->filterByLastUpdated('now'); // WHERE last_updated = '2011-03-14'
     * $query->filterByLastUpdated(array('max' => 'yesterday')); // WHERE last_updated > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastUpdated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(ImproveImprovementPlanTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ImproveImprovementPlanTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProjects() only accepts arguments of type \Projects or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Projects relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function joinProjects($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Projects');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Projects');
        }

        return $this;
    }

    /**
     * Use the Projects relation Projects object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProjectsQuery A secondary query class using the current class as primary query
     */
    public function useProjectsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjects($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Projects', '\ProjectsQuery');
    }

    /**
     * Filter the query by a related \ProjectPhases object
     *
     * @param \ProjectPhases|ObjectCollection $projectPhases The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(ImproveImprovementPlanTableMap::COL_PHASE_ID, $projectPhases->getId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ImproveImprovementPlanTableMap::COL_PHASE_ID, $projectPhases->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProjectPhases() only accepts arguments of type \ProjectPhases or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProjectPhases relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function joinProjectPhases($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProjectPhases');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ProjectPhases');
        }

        return $this;
    }

    /**
     * Use the ProjectPhases relation ProjectPhases object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProjectPhasesQuery A secondary query class using the current class as primary query
     */
    public function useProjectPhasesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectPhases($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProjectPhases', '\ProjectPhasesQuery');
    }

    /**
     * Filter the query by a related \PhaseComponents object
     *
     * @param \PhaseComponents|ObjectCollection $phaseComponents The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseComponents($phaseComponents, $comparison = null)
    {
        if ($phaseComponents instanceof \PhaseComponents) {
            return $this
                ->addUsingAlias(ImproveImprovementPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->getId(), $comparison);
        } elseif ($phaseComponents instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ImproveImprovementPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPhaseComponents() only accepts arguments of type \PhaseComponents or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PhaseComponents relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function joinPhaseComponents($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PhaseComponents');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PhaseComponents');
        }

        return $this;
    }

    /**
     * Use the PhaseComponents relation PhaseComponents object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PhaseComponentsQuery A secondary query class using the current class as primary query
     */
    public function usePhaseComponentsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPhaseComponents($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PhaseComponents', '\PhaseComponentsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildImproveImprovementPlan $improveImprovementPlan Object to remove from the list of results
     *
     * @return $this|ChildImproveImprovementPlanQuery The current query, for fluid interface
     */
    public function prune($improveImprovementPlan = null)
    {
        if ($improveImprovementPlan) {
            $this->addUsingAlias(ImproveImprovementPlanTableMap::COL_ID, $improveImprovementPlan->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the improve_improvement_plan table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ImproveImprovementPlanTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ImproveImprovementPlanTableMap::clearInstancePool();
            ImproveImprovementPlanTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ImproveImprovementPlanTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ImproveImprovementPlanTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ImproveImprovementPlanTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ImproveImprovementPlanTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ImproveImprovementPlanQuery
