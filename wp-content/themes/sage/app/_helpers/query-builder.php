<?php

namespace MI;

use Exception;
use InvalidArgumentException;
use RuntimeException;

/**
 * @author  : Vanno
 * @version : 1
 */

defined('ABSPATH') || die('Cant access directly');

class DB
{
    protected static $wpdb;
    protected static $table;
    protected static $limit;
    protected static $offset;
    protected static $selects          = [];
    protected static $wheres           = [];
    protected static $joins            = [];
    protected static $groupBys         = [];
    protected static $orderBys         = [];
    protected static $updates          = [];
    protected static $transactionLevel = 0;

    public static function table($table)
    {
        global $wpdb;
        self::$wpdb     = $wpdb;
        self::$table    = $table;
        self::$selects  = ['*'];
        self::$wheres   = [];
        self::$joins    = [];
        self::$groupBys = [];
        self::$orderBys = [];
        self::$limit    = null;
        self::$offset   = null;
        return new self();
    }

    public static function select($columns = ['*'])
    {
        if (is_array($columns)) {
            self::$selects = $columns;
        } else {
            self::$selects = func_get_args();
        }
        return new self();
    }

    public static function call($procedure, $params = [])
    {
        $paramList = implode(', ', array_fill(0, count($params), '%s'));
        $sql = "CALL $procedure($paramList)";

        $stringParams = array_map(function ($param) {
            return is_object($param) ? (string) $param : $param;
        }, $params);

        try {
            $prepared_sql = self::$wpdb->prepare($sql, ...$stringParams);
            return self::$wpdb->get_results($prepared_sql);
        } catch (Exception $e) {
            throw new RuntimeException('Database procedure call failed: ' . $e->getMessage());
        }
    }

    public static function join($table, $first, $operator, $second, $type = 'INNER')
    {
        self::$joins[] = [$type, $table, $first, $operator, $second];
        return new self();
    }

    public static function leftJoin($table, $first, $operator, $second)
    {
        return self::join($table, $first, $operator, $second, 'LEFT');
    }

    public static function rightJoin($table, $first, $operator, $second)
    {
        return self::join($table, $first, $operator, $second, 'RIGHT');
    }

    public static function where($column, $operator, $value, $boolean = 'AND', $upsert = false)
    {
        if ((!empty($column) && !empty($operator) && !empty($value)) || $upsert) {

            if (strtoupper($operator) === 'LIKE' || strtoupper($operator) === 'NOT LIKE') {
                $value = '%' . $value . '%';
            }
            self::$wheres[] = ["$column $operator %s", [$value], $boolean];
        }
        return new self();
    }

    public static function orWhere($column, $operator, $value)
    {
        return self::where($column, $operator, $value, 'OR');
    }

    public static function whereRaw($raw, $values = [], $boolean = 'AND')
    {
        if (!empty($raw)) {
            self::$wheres[] = [$raw, $values, $boolean];
        }
        return new self();
    }

    public static function orWhereRaw($raw, $values = [])
    {
        return self::whereRaw($raw, $values, 'OR');
    }

    public static function nestedWhere($callback, $boolean = 'AND')
    {
        $nestedQuery = new self();
        $callback($nestedQuery);
        self::$wheres[] = [$nestedQuery::$wheres, $boolean];
        return new self();
    }

    public static function nestedOrWhere($column, $values)
    {
        return self::nestedWhere($column, $values, 'OR');
    }

    public static function whereIn($column, $values, $boolean = 'AND')
    {
        if (!empty($column) && !empty($values)) {

            if (!is_array($values)) $values = (array)$values;

            $placeholders = array_fill(0, count($values), '%s');
            $inClause = "$column IN (" . implode(', ', $placeholders) . ")";
            self::$wheres[] = [$inClause, $values, $boolean];
        }

        return new self();
    }

    public static function orWhereIn($column, $values)
    {
        return self::whereIn($column, $values, 'OR');
    }

    public static function whereNull($column, $boolean = 'AND')
    {
        self::$wheres[] = ["$column IS NULL", [], $boolean];
        return new self();
    }

    public static function orWhereNull($column)
    {
        return self::whereNull($column, 'OR');
    }

    public static function whereNotNull($column, $boolean = 'AND')
    {
        if (!empty($column)) {
            self::$wheres[] = ["$column IS NOT NULL", [], $boolean];
        }
        return new self();
    }

    public static function orWhereNotNull($column)
    {
        return self::whereNotNull($column, 'OR');
    }

    public static function whereEmpty($column, $boolean = 'AND')
    {
        self::$wheres[] = ["$column = ''", [], $boolean];
        return new self();
    }

    public static function orWhereEmpty($column)
    {
        return self::whereEmpty($column, 'OR');
    }

    public static function whereNotEmpty($column, $boolean = 'AND')
    {
        self::$wheres[] = ["$column != ''", [], $boolean];
        return new self();
    }

    public static function orWhereNotEmpty($column)
    {
        return self::whereNotEmpty($column, 'OR');
    }

    public static function whereAny($columns, $comparison, $value, $boolean = 'AND')
    {
        if (!empty($value) && $value != null && !empty($columns) && is_array($columns)) {
            $conditions = [];
            $values = [];

            foreach ($columns as $column) {
                if (strtoupper($comparison) === 'LIKE') {
                    $conditions[] = "$column LIKE %s";
                    $values[] = '%' . $value . '%';
                } else {
                    $conditions[] = "$column $comparison %s";
                    $values[] = $value;
                }
            }

            if (!empty($conditions)) {
                $whereClause = '(' . implode(' OR ', $conditions) . ')';
                self::$wheres[] = [$whereClause, $values, $boolean];
            }
        }
        return new self();
    }

    public static function orWhereAny($columns, $operator, $value)
    {
        return self::whereAny($columns, $operator, $value, 'OR');
    }

    public static function whereNotIn($column, $values, $boolean = 'AND')
    {
        if (!empty($column) && !empty($values) && is_array($values)) {
            $placeholders = array_fill(0, count($values), '%s');
            $notInClause = "$column NOT IN (" . implode(', ', $placeholders) . ")";
            self::$wheres[] = [$notInClause, $values, $boolean];
        }
        return new self();
    }

    public static function orWhereNotIn($column, $values)
    {
        return self::whereNotIn($column, $values, 'OR');
    }

    public static function whereBetween($column, $values, $boolean = 'AND')
    {
        if (!empty($column) && is_array($values) && !empty($values[0]) && count($values) === 2) {
            $placeholders = implode(' AND ', ['%s', '%s']);
            $whereClause = "$column BETWEEN $placeholders";
            self::$wheres[] = [$whereClause, $values, $boolean];
        }
        return new self();
    }

    public static function groupBy($columns)
    {
        if (is_array($columns)) {
            self::$groupBys = array_merge(self::$groupBys, $columns);
        } else {
            self::$groupBys[] = $columns;
        }
        return new self();
    }

    public static function orderBy($column, $direction = 'ASC')
    {
        if (!empty($column)) self::$orderBys[] = [$column, $direction];
        return new self();
    }

    public static function nestedOrderBy($callback)
    {
        $nestedOrderBy = new self();
        $callback($nestedOrderBy);
        self::$orderBys[] = $nestedOrderBy::$orderBys;
        return new self();
    }

    public static function limit($limit)
    {
        if (!empty($limit))  self::$limit = $limit;
        return new self();
    }

    public static function offset($offset)
    {
        if (!empty($offset)) self::$offset = $offset;
        return new self();
    }

    protected static function buildSelect()
    {
        $columns = implode(', ', self::$selects);
        return "SELECT $columns FROM " . self::$table;
    }

    protected static function buildJoin()
    {
        if (empty(self::$joins)) return '';

        $joinClause = '';
        foreach (self::$joins as $join) {
            list($type, $table, $first, $operator, $second) = $join;
            $joinClause .= " $type JOIN $table ON $first $operator $second";
        }
        return $joinClause;
    }

    protected static function buildWhere()
    {
        if (empty(self::$wheres)) return '';

        $whereClause = ' WHERE ';
        foreach (self::$wheres as $index => $where) {
            list($condition, $values, $boolean) = $where;
            if ($index > 0) $whereClause .= " $boolean ";

            $whereClause .= $condition;
        }
        return $whereClause;
    }

    protected static function buildGroupBy()
    {
        if (empty(self::$groupBys)) return '';

        return ' GROUP BY ' . implode(', ', self::$groupBys);
    }

    protected static function buildOrderBy()
    {
        if (empty(self::$orderBys)) return '';

        $orderClause = ' ORDER BY ';
        foreach (self::$orderBys as $index => $orderBy) {
            list($column, $direction) = $orderBy;
            $orderClause .= ($index > 0 ? ', ' : '') . "$column $direction";
        }
        return $orderClause;
    }

    protected static function buildLimit()
    {
        if (self::$limit !== null) return " LIMIT %d";
        return '';
    }

    protected static function buildOffset()
    {
        if (self::$offset !== null) return " OFFSET %d";
        return '';
    }

    public static function toSql()
    {
        $sql  = self::buildSelect();
        $sql .= self::buildJoin();
        $sql .= self::buildWhere();
        $sql .= self::buildGroupBy();
        $sql .= self::buildOrderBy();
        $sql .= self::buildLimit();
        $sql .= self::buildOffset();

        $values = [];
        foreach (self::$wheres as $where) {
            $values = array_merge($values, $where[1]);
        }

        if (self::$limit !== null) $values[] = self::$limit;
        if (self::$offset !== null) $values[] = self::$offset;

        return [$sql, $values];
    }

    public static function get($return = OBJECT)
    {
        try {
            list($sql, $values) = self::toSql();

            if (self::_containsPlaceholders($sql)) {
                $prepared_sql = self::$wpdb->prepare($sql, ...$values);
                $results = self::$wpdb->get_results($prepared_sql, $return);
            } else {
                $results = self::$wpdb->get_results($sql, $return);
            }

            if (self::$wpdb->last_error) throw new RuntimeException('Database query failed: ' . self::$wpdb->last_error);

            return $results;
        } catch (Exception $e) {
            throw new RuntimeException('Database query failed: ' . $e->getMessage());
        }
    }

    public static function col()
    {
        try {
            list($sql, $values) = self::toSql();

            if (self::_containsPlaceholders($sql)) {
                $prepared_sql = self::$wpdb->prepare($sql, ...$values);
                $results = self::$wpdb->get_col($prepared_sql);
            } else {
                $results = self::$wpdb->get_col($sql);
            }

            if (self::$wpdb->last_error) throw new RuntimeException('Database query failed: ' . self::$wpdb->last_error);

            return $results;
        } catch (Exception $e) {
            throw new RuntimeException('Database query failed: ' . $e->getMessage());
        }
    }

    private static function _containsPlaceholders($sql)
    {
        if (strpos($sql, '%s') === false && strpos($sql, '%d') === false) return false;
        return true;
    }

    public static function first($return = OBJECT)
    {
        try {
            list($sql, $values) = self::toSql();

            $sql .= ' LIMIT 1';

            if (self::_containsPlaceholders($sql)) {
                $prepared_sql = self::$wpdb->prepare($sql, ...$values);
                $result = self::$wpdb->get_row($prepared_sql, $return);
            } else {
                $result = self::$wpdb->get_row($sql, $return);
            }

            if (self::$wpdb->last_error) throw new RuntimeException('Database query failed: ' . self::$wpdb->last_error);

            return $result;
        } catch (Exception $e) {
            throw new RuntimeException('Database query failed: ' . $e->getMessage());
        }
    }

    public static function last($return = OBJECT)
    {
        try {
            list($sql, $values) = self::toSql();

            $sql .= ' ORDER BY id DESC LIMIT 1';

            if (self::_containsPlaceholders($sql)) {
                $prepared_sql = self::$wpdb->prepare($sql, ...$values);
                $result = self::$wpdb->get_row($prepared_sql, $return);
            } else {
                $result = self::$wpdb->get_row($sql, $return);
            }

            if (self::$wpdb->last_error) {
                throw new RuntimeException('Database query failed: ' . self::$wpdb->last_error);
            }

            return $result;
        } catch (Exception $e) {
            throw new RuntimeException('Database query failed: ' . $e->getMessage());
        }
    }

    public static function find($id, $primaryKey = 'id')
    {
        return self::table(self::$table)->where($primaryKey, '=', sanitize_key($id))->first();
    }

    public static function var()
    {
        try {
            list($sql, $values) = self::toSql();

            $sql .= ' LIMIT 1';

            if (self::_containsPlaceholders($sql)) {
                $prepared_sql = self::$wpdb->prepare($sql, ...$values);
                return self::$wpdb->get_var($prepared_sql);
            } else {
                return self::$wpdb->get_var($sql);
            }
        } catch (Exception $e) {
            throw new RuntimeException('Database query failed: ' . $e->getMessage());
        }
    }

    public static function count()
    {
        try {
            $selectBackup = self::$selects;
            self::$selects = ['COUNT(*) as count'];

            list($sql, $values) = self::toSql();

            self::$selects = $selectBackup;

            $prepared_sql = self::$wpdb->prepare($sql, ...$values);
            $result = self::$wpdb->get_row($prepared_sql);
            return $result ? $result->count : 0;
        } catch (Exception $e) {
            throw new RuntimeException('Database query failed: ' . $e->getMessage());
        }
    }

    public static function insert($data)
    {
        if (empty($data)) {
            throw new InvalidArgumentException('No data provided for insert.');
        }

        $isMultiple = isset($data[0]) && is_array($data[0]);

        if ($isMultiple) {
            $columns = array_keys($data[0]);
            $values = [];
            foreach ($data as $row) {
                $values = array_merge($values, array_values($row));
            }
        } else {
            $columns = array_keys($data);
            $values = array_values($data);
        }

        $columnList = implode(', ', $columns);
        $placeholders = '(' . implode(', ', array_fill(0, count($columns), '%s')) . ')';
        $allPlaceholders = $isMultiple ? implode(', ', array_fill(0, count($data), $placeholders)) : $placeholders;

        $sql = "INSERT INTO " . self::$table . " ($columnList) VALUES $allPlaceholders";

        try {
            $prepared_sql = self::$wpdb->prepare($sql, ...$values);
            $results = self::$wpdb->query($prepared_sql);

            if (self::$wpdb->last_error) {
                throw new RuntimeException('Database insert failed: ' . self::$wpdb->last_error);
            }

            if ($isMultiple) {
                return $results;
            } else {
                return self::$wpdb->insert_id;
            }
        } catch (Exception $e) {
            throw new RuntimeException('Database insert failed: ' . $e->getMessage());
        }
    }

    public static function update($data)
    {
        if (empty($data)) throw new InvalidArgumentException('No data provided for update.');

        $sql = "UPDATE " . self::$table . " SET ";
        $setClauses = [];
        $values = [];

        foreach ($data as $column => $value) {
            $setClauses[] = "$column = %s";
            $values[] = $value;
        }

        $sql .= implode(', ', $setClauses);
        $sql .= self::buildWhere();
        $sql .= self::buildLimit();
        $sql .= self::buildOffset();

        foreach (self::$wheres as $where) {
            $values = array_merge($values, $where[1]);
        }

        if (self::$limit !== null) $values[] = self::$limit;
        if (self::$offset !== null) $values[] = self::$offset;

        try {
            $prepared_sql = self::$wpdb->prepare($sql, ...$values);
            $result = self::$wpdb->query($prepared_sql);

            if (self::$wpdb->last_error) throw new RuntimeException('Database update failed: ' . self::$wpdb->last_error);

            return $result;
        } catch (Exception $e) {
            throw new RuntimeException('Database update failed: ' . $e->getMessage());
        }
    }

    public static function upsert($data, $uniqueKeys)
    {
        if (!empty($data)) {
            if (!is_array($uniqueKeys)) $uniqueKeys = [$uniqueKeys];

            $check_data = self::checkArrayType($data);
            $dataSet    = $check_data == 'Single' ? [$data] : ($check_data == 'Array' ? $data : [array_shift($data)]);

            foreach ($dataSet as $data) {
                foreach ($uniqueKeys as $key) {
                    if (!array_key_exists($key, $data)) throw new InvalidArgumentException("Unique key '$key' not found in data.");
                }

                $query = self::table(self::$table);
                foreach ($uniqueKeys as $key) {
                    $query = $query->where($key, '=', $data[$key], 'AND', true);
                }

                $existingRecord = $query->first();
                if ($existingRecord) {
                    $updateData = $data;
                    $updateQuery = self::table(self::$table);
                    foreach ($uniqueKeys as $key) {
                        $updateQuery = $updateQuery->where($key, '=', $existingRecord->$key);
                    }

                    $updateQuery->update($updateData);
                } else {
                    if ($check_data == 'Single') {
                        return self::insert($data);
                    } else {
                        self::insert($data);
                    }
                }
            }
        }
    }

    public static function delete()
    {
        try {
            $sql = "DELETE FROM " . self::$table;
            $sql .= self::buildWhere();
            $sql .= self::buildLimit();
            $sql .= self::buildOffset();

            $values = [];
            foreach (self::$wheres as $where) {
                $values = array_merge($values, $where[1]);
            }

            if (self::$limit  !== null) $values[] = self::$limit;
            if (self::$offset !== null) $values[] = self::$offset;

            $prepared_sql = self::$wpdb->prepare($sql, ...$values);
            $result = self::$wpdb->query($prepared_sql);

            if (self::$wpdb->last_error) throw new RuntimeException('Database delete failed: ' . self::$wpdb->last_error);

            return $result;
        } catch (Exception $e) {
            throw new RuntimeException('Database delete failed: ' . $e->getMessage());
        }
    }

    private static function checkArrayType($variable)
    {
        if (is_array($variable)) {
            $isArrayofArrays = true;
            foreach ($variable as $item) {
                if (!is_array($item)) {
                    $isArrayofArrays = false;
                    break;
                }
            }

            if ($isArrayofArrays) {
                if (count($variable) === 1) {
                    return "Single Array";
                } else {
                    return "Array";
                }
            } else {
                return "Single";
            }
        } else {
            return "Not an array";
        }
    }

    public static function beginTransaction()
    {
        global $wpdb;
        self::$wpdb = $wpdb;

        if (self::$transactionLevel === 0) {
            self::$wpdb->query('START TRANSACTION');
        } elseif (self::$transactionLevel && self::$wpdb->query('SAVEPOINT trans' . self::$transactionLevel) === false) {
            throw new RuntimeException('Failed to create savepoint: ' . self::$wpdb->last_error);
        }
        self::$transactionLevel++;
        return true;
    }

    public static function commit()
    {
        if (self::$transactionLevel === 1) {
            self::$wpdb->query('COMMIT');
        } elseif (self::$transactionLevel && self::$wpdb->query('RELEASE SAVEPOINT trans' . self::$transactionLevel) === false) {
            throw new RuntimeException('Failed to release savepoint: ' . self::$wpdb->last_error);
        }
        self::$transactionLevel--;
        return true;
    }

    public static function rollback()
    {
        if (self::$transactionLevel === 1) {
            self::$wpdb->query('ROLLBACK');
        } elseif (self::$transactionLevel && self::$wpdb->query('ROLLBACK TO SAVEPOINT trans' . self::$transactionLevel) === false) {
            throw new RuntimeException('Failed to rollback to savepoint: ' . self::$wpdb->last_error);
        }
        self::$transactionLevel--;
        return true;
    }

    public static function runMultipleQueries($sql)
    {
        $queries = explode(';', $sql);

        foreach ($queries as $query) {
            $trimmedQuery = trim($query);
            if (!empty($trimmedQuery)) {
                self::$wpdb->query($trimmedQuery);

                if (self::$wpdb->last_error) {
                    throw new RuntimeException('Database query failed: ' . self::$wpdb->last_error);
                }
            }
        }

        return true;
    }
}
