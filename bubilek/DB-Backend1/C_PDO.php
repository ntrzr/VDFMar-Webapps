<?php
    require_once "Interfaces.php";

    class DB implements DBI {
        private $pdo;

        public function connect(
            string $host = "",
            string $username = "",
            string $password = "",
            string $database = ""
        ): ?static {
            try {
                $dsn = "mysql:host={$host};dbname={$database};charset=utf8mb4";
                $this->pdo = new PDO($dsn, $username, $password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Connection failed: " . $e->getMessage());
                return null;
            }
            return $this;
        }

        public function select(string $query): array {
            $stmt = $this->pdo->query($query);
            if (!$stmt) {
                error_log("Query failed: " . $this->pdo->errorInfo()[2]);
                return [];
            }
            return $stmt->fetchAll();
        }

        public function insert(string $table, array $data): bool {
            $keys = array_keys($data);
            $values = array_values($data);
            $sql = "INSERT INTO {$table} (" . implode(',', $keys) . ") VALUES (" . rtrim(str_repeat('?,', count($values)), ',') . ")";
            $stmt = $this->pdo->prepare($sql);
            if (!$stmt) {
                error_log("Insert statement prepare failed: " . $this->pdo->errorInfo()[2]);
                return false;
            }
            $result = $stmt->execute($values);
            if (!$result) {
                error_log("Insert statement execution failed: " . $this->pdo->errorInfo()[2]);
            }
            return $result;
        }

        public function update(string $table, int $id, array $data): bool {
            $set = implode(',', array_map(function ($key) {
                return "{$key}=?";
            }, array_keys($data)));
            $sql = "UPDATE {$table} SET {$set} WHERE id=?";
            $values = array_values($data);
            $values[] = $id;
            $stmt = $this->pdo->prepare($sql);
            if (!$stmt) {
                error_log("Update statement prepare failed: " . $this->pdo->errorInfo()[2]);
                return false;
            }
            $result = $stmt->execute($values);
            if (!$result) {
                error_log("Update statement execution failed: " . $this->pdo->errorInfo()[2]);
            }
            return $result;
        }

        public function delete(string $table, int $id): bool {
            $sql = "DELETE FROM {$table} WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            if (!$stmt) {
                error_log("Delete statement prepare failed: " . $this->pdo->errorInfo()[2]);
                return false;
            }
            $result = $stmt->execute([$id]);
            if (!$result) {
                error_log("Delete statement execution failed: " . $this->pdo->errorInfo()[2]);
            }
            return $result;
        }
    }
?>