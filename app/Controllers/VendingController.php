<?php

namespace App\Controllers;

use duncan3dc\Laravel\BladeInstance;
use PDO;

class VendingController
{
    private BladeInstance $blade;
    private PDO $pdo;

    public function __construct(BladeInstance $blade)
    {
        $this->blade = $blade;

        require dirname(__DIR__, 2) . '/database.php';
        $this->pdo = $pdo;
    }

    public function index(): void
    {
        $this->renderOrders();
    }

    public function create(): void
    {
        $this->renderOrders();
    }

    public function store(): void
    {
        $order = $this->validatedOrder();
        if (isset($order['error'])) {
            http_response_code(422);
            $this->renderOrders($order, $order['error']);
            return;
        }

        $statement = $this->pdo->prepare(
            'INSERT INTO orders (product_name, gram, status, done)
             VALUES (:product_name, :gram, :status, :done)'
        );
        $statement->execute([
            'product_name' => $order['product_name'],
            'gram' => $order['gram'],
            'status' => $order['status'],
            'done' => $order['done'],
        ]);

        $this->redirect('/vending?created=1');
    }

    public function edit(string $id): void
    {
        $order = $this->findOrder($id);
        if ($order === null) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        $this->renderOrders($order);
    }

    public function update(string $id): void
    {
        if ($this->findOrder($id) === null) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        $order = $this->validatedOrder();
        $order['id'] = (int) $id;
        if (isset($order['error'])) {
            http_response_code(422);
            $this->renderOrders($order, $order['error']);
            return;
        }

        $statement = $this->pdo->prepare(
            'UPDATE orders
             SET product_name = :product_name, gram = :gram, status = :status, done = :done
             WHERE id = :id'
        );
        $statement->execute([
            'product_name' => $order['product_name'],
            'gram' => $order['gram'],
            'status' => $order['status'],
            'done' => $order['done'],
            'id' => $order['id'],
        ]);

        $this->redirect('/vending?updated=1');
    }

    public function destroy(string $id): void
    {
        $statement = $this->pdo->prepare('DELETE FROM orders WHERE id = :id');
        $statement->execute(['id' => (int) $id]);

        if ($statement->rowCount() === 0) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        $this->redirect('/vending?deleted=1');
    }

    private function renderOrders(?array $order = null, ?string $error = null): void
    {
        $orders = $this->pdo
            ->query('SELECT * FROM orders ORDER BY created_at DESC, id DESC')
            ->fetchAll();

        echo $this->blade->render('vending.orders', [
            'orders' => $orders,
            'order' => $order,
            'error' => $error,
        ]);
    }

    private function findOrder(string $id): ?array
    {
        $statement = $this->pdo->prepare('SELECT * FROM orders WHERE id = :id');
        $statement->execute(['id' => (int) $id]);
        $order = $statement->fetch();

        return $order === false ? null : $order;
    }

    private function validatedOrder(): array
    {
        $productName = trim((string) ($_POST['product_name'] ?? 'protein_powder'));
        $gram = (string) ($_POST['gram'] ?? '');
        $status = (string) ($_POST['status'] ?? 'not_dispense');
        $done = (string) ($_POST['done'] ?? '0');

        if ($productName === '' || strlen($productName) > 100) {
            return [
                'product_name' => $productName,
                'gram' => $gram,
                'status' => $status,
                'done' => $done,
                'error' => 'Product name is required and must be 100 characters or fewer.',
            ];
        }

        if (!in_array($gram, ['30', '60', '90'], true)) {
            return [
                'product_name' => $productName,
                'gram' => $gram,
                'status' => $status,
                'done' => $done,
                'error' => 'Choose a valid serving size: 30, 60, or 90 grams.',
            ];
        }

        if (!in_array($status, ['dispense', 'not_dispense'], true)) {
            return [
                'product_name' => $productName,
                'gram' => $gram,
                'status' => $status,
                'done' => $done,
                'error' => 'Choose a valid order status.',
            ];
        }

        if (!in_array($done, ['0', '1'], true)) {
            return [
                'product_name' => $productName,
                'gram' => $gram,
                'status' => $status,
                'done' => $done,
                'error' => 'Choose a valid completion value.',
            ];
        }

        return [
            'product_name' => $productName,
            'gram' => (int) $gram,
            'status' => $status,
            'done' => (int) $done,
        ];
    }

    private function redirect(string $location): void
    {
        header('Location: ' . $location, true, 303);
        exit;
    }
}
