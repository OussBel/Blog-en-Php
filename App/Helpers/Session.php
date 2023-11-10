<?php
declare (strict_types=1);

namespace App\Helpers;

class Session
{

    public $id;
    public $role;
    public $csrfToken;
    private static $instance;

    /**
     * @throws \Exception
     */
    private function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->id = $_SESSION['id'] ?? 0;
        $this->role = $_SESSION['role'] ?? 'pending';

        if (!isset($_SESSION['csrfToken'])) {
            $_SESSION['csrfToken'] = bin2hex(random_bytes(32));
        }
        $this->csrfToken = $_SESSION['csrfToken'];
    }

    public static function getInstance(): Session
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function create(object $member): void
    {
        session_regenerate_id(true);
        $_SESSION['id'] = $member->id;
        $_SESSION['role'] = $member->role;
    }

    public function delete(): void
    {
        $_SESSION = [];
        $param = session_get_cookie_params();
        setcookie(session_name(), '', time() - 2400, $param['path'], $param['domain'],
            $param['secure'], $param['httponly']);
        session_destroy();
    }
}
