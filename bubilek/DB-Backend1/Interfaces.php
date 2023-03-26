<?php
    interface DBI {
        public function connect(string $host, string $username, string $password, string $database): ?self;
        public function select(string $query): array;
        public function insert(string $table, array $data): bool;
        public function update(string $table, int $id, array $data): bool;
        public function delete(string $table, int $id): bool;
    }
?>