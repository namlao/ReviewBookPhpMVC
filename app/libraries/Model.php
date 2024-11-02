<?php
class Model {
    protected $connection = null;
    protected $table = '';
    protected $primaryKey = 'id';
    protected $query; // Store the SQL query
    protected $params = []; // Store parameters for prepared statements
    protected $types = ''; // Store types of parameters

    public function __construct() {
        $this->connection = new Database; // Assuming Database is your database connection wrapper
    }

    public function table($tableName) {
        $this->table = $tableName;
        return $this; // Allow chaining
    }

    // Prepare to get all records with optional conditions
    public function getAll() {
        $this->query = "SELECT * FROM $this->table";
        $this->params = []; // Reset params for new query
        $this->types = ''; // Reset types for new query
        return $this; // Allow chaining
    }

    // Execute the query and return results
    public function execute() {
        // Prepare and execute the statement
        $this->stmt = $this->connection->prepare($this->query);
        if ($this->params) {
            $this->stmt->bind_param($this->types, ...$this->params);
        }

        $this->stmt->execute();
        $result = $this->stmt->get_result();

        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }

        // Reset query and params for next usage
        $this->resetQuery();

        return $items; // Return results
    }

    // Build WHERE clause
    public function where(array $conditions) {
        if (empty($conditions)) {
            return $this; // Allow chaining without adding any conditions
        }

        $whereClauses = [];
        foreach ($conditions as $condition) {
            // Expecting format like "column = value"
            list($column, $value) = explode(" = ", $condition);
            $whereClauses[] = "$column = ?";
            $this->params[] = $value; // Store the value for binding
            $this->types .= 's'; // Assuming all values are strings; adjust as needed
        }

        // Add WHERE clause to query
        $this->query .= " WHERE " . implode(" AND ", $whereClauses);
        return $this; // Allow method chaining
    }

    // Get a single record by ID
    public function getById($id) {
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = ?";
        $this->stmt = $this->connection->prepare($sql);
        $this->stmt->bind_param("i", $id);
        $this->stmt->execute();
        $result = $this->stmt->get_result();
        return $result->fetch_assoc();
    }

    // Add a new record
    public function add(array $data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = rtrim(str_repeat('?, ', count($data)), ', '); // Create placeholders
        $this->query = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

        $this->params = array_values($data); // Get values from data array
        $this->types = str_repeat('s', count($data)); // Assuming all values are strings; adjust as needed

        $this->stmt = $this->connection->prepare($this->query);
        $this->stmt->bind_param($this->types, ...$this->params);
        $this->stmt->execute();

        // Reset query and params for next usage
        $this->resetQuery();

        return $this->stmt->insert_id; // Return the ID of the newly inserted record
    }

    // Delete a record by ID
    public function deleteId($id) {
        $this->query = "DELETE FROM $this->table WHERE $this->primaryKey = ?";
        $this->stmt = $this->connection->prepare($this->query);
        
        if ($this->stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->connection->error));
        }
    
        $this->stmt->bind_param("i", $id);
        $executeResult = $this->stmt->execute();
        
        if ($executeResult === false) {
            die('Execute failed: ' . htmlspecialchars($this->stmt->error));
        }
    
        // Reset query and params for next usage
        $this->resetQuery();
    
        return $this->stmt->affected_rows; // Return number of affected rows
    }
    // Update a record by ID
    public function update($id, array $data) {
    // Prepare the SET clause
        $setClauses = [];
        foreach ($data as $column => $value) {
            $setClauses[] = "$column = ?"; // Prepare for binding
            $this->params[] = $value; // Store value for binding
            $this->types .= 's'; // Assuming all values are strings; adjust as needed
        }

        // Create the SQL query
        $this->query = "UPDATE $this->table SET " . implode(", ", $setClauses) . " WHERE $this->primaryKey = ?";
        $this->params[] = $id; // Add the ID for the WHERE clause
        $this->types .= 'i'; // Add type for the ID (assuming it's an integer)

        // Prepare and execute the statement
        $this->stmt = $this->connection->prepare($this->query);
        
        if ($this->stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->connection->error));
        }

        // Bind parameters
        $this->stmt->bind_param($this->types, ...$this->params);
        $executeResult = $this->stmt->execute();

        if ($executeResult === false) {
            die('Execute failed: ' . htmlspecialchars($this->stmt->error));
        }

        // Reset query and params for next usage
        $this->resetQuery();

        return $this->stmt->affected_rows; // Return number of affected rows
    }

    // Reset the query and parameters
    protected function resetQuery() {
        $this->query = '';
        $this->params = [];
        $this->types = '';
    }
}
