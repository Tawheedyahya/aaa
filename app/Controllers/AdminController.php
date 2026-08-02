<?php

namespace App\Controllers;

use duncan3dc\Laravel\BladeInstance;

class AdminController
{
    protected $blade;
    protected $dataFile;
    protected $imageDir;
    protected $logDir;
    protected $logFile;

    public function __construct(BladeInstance $blade)
    {
        $this->blade = $blade;
        $this->dataFile = dirname(__DIR__, 2) . '/views/data/our_recent_projects.json';
        $this->imageDir = dirname(__DIR__, 2) . '/public/assets/projects/';

        // Where debug logs go. Change if you want them somewhere else.
        $this->logDir  = dirname(__DIR__, 2) . '/storage/logs/';
        $this->logFile = $this->logDir . 'admin.log';
    }

    /**
     * Write a line to storage/logs/admin.log.
     * Creates the storage/logs directory automatically if it doesn't exist yet.
     */
    protected function log(string $message): void
    {
        try {
            if (!is_dir($this->logDir)) {
                // recursive = true so it creates storage/ and storage/logs/ if needed
                mkdir($this->logDir, 0775, true);
            }

            $line = '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
            file_put_contents($this->logFile, $line, FILE_APPEND | LOCK_EX);
        } catch (\Throwable $e) {
            // If logging itself fails, there's nothing more we can do here.
            // We deliberately swallow this so a broken log never breaks the request.
        }
    }

    protected function getProjects(): array
    {
        return json_decode(file_get_contents($this->dataFile), true);
    }

    protected function saveProjects(array $projects): void
    {
        $json = json_encode(
            $projects,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE
        );
        if ($json === false) {
            throw new \RuntimeException('Failed to encode projects JSON: ' . json_last_error_msg());
        }
        $written = file_put_contents($this->dataFile, $json);
        if ($written === false) {
            throw new \RuntimeException('Failed to write projects data file');
        }
    }

    /**
     * Recursively force every string in an array (or a single string) to be
     * valid UTF-8. Pasted content from Word/Outlook/PDF often carries
     * Windows-1252 smart quotes/dashes that break json_encode() and get
     * silently swallowed by htmlspecialchars() when displaying errors.
     */
    protected function sanitizeUtf8($value)
    {
        if (is_array($value)) {
            $clean = [];
            foreach ($value as $k => $v) {
                $clean[$k] = $this->sanitizeUtf8($v);
            }
            return $clean;
        }

        if (!is_string($value)) {
            return $value;
        }

        if (!mb_check_encoding($value, 'UTF-8')) {
            $detected = mb_detect_encoding($value, ['UTF-8', 'Windows-1252', 'ISO-8859-1'], true);
            if ($detected && $detected !== 'UTF-8') {
                $value = mb_convert_encoding($value, 'UTF-8', $detected);
            } else {
                $value = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
            }
        }

        return $value;
    }

    protected function sanitizedPost(string $key, $default = '')
    {
        if (!isset($_POST[$key])) {
            return $default;
        }
        return $this->sanitizeUtf8($_POST[$key]);
    }

    public function index()
    {
        $projects = $this->getProjects();
        echo $this->blade->render('admin.projects', [
            'projects' => $projects
        ]);
    }

    public function edit($id)
    {
        $projects = $this->getProjects();
        $project = null;
        foreach ($projects as $p) {
            if ((int)$p['id'] === (int)$id) {
                $project = $p;
                break;
            }
        }
        if (!$project) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }
        echo $this->blade->render('admin.project-edit', [
            'project' => $project
        ]);
    }

    public function update($id)
    {
        $this->log("update() called for id={$id}. POST keys: " . implode(',', array_keys($_POST)));

        // If any stray output (whitespace/BOM before <?php, a var_dump, a notice, etc.)
        // was already sent, header('Location: ...') will fail silently and the page
        // will look like "nothing happened" even though the save succeeded.
        if (headers_sent($sentFile, $sentLine)) {
            $this->log("update() WARNING - edit not work: headers already sent at {$sentFile}:{$sentLine}, redirect will be ignored by the browser.");
        }

        try {
            $projects = $this->getProjects();
            $index = null;
            foreach ($projects as $i => $p) {
                if ((int)$p['id'] === (int)$id) {
                    $index = $i;
                    break;
                }
            }

            if ($index === null) {
                $this->log("update() FAILED - edit not work: project id={$id} not found in data file.");
                http_response_code(404);
                echo '404 Project Not Found';
                return;
            }

            $projects[$index]['title'] = $this->sanitizedPost('title', $projects[$index]['title']);
            $projects[$index]['short_description'] = $this->sanitizedPost('short_description', $projects[$index]['short_description']);
            $projects[$index]['description'] = $this->sanitizedPost('description', $projects[$index]['description']);
            $projects[$index]['category'] = $this->sanitizedPost('category', $projects[$index]['category']);
            $projects[$index]['location'] = $this->sanitizedPost('location', $projects[$index]['location']);
            $projects[$index]['date'] = $this->sanitizedPost('date', $projects[$index]['date']);
            $projects[$index]['ad'] = !empty($_POST['ad']);

            if (!empty($_FILES['images']['name'][0])) {
                $uploaded = $this->handleImageUploads();
                $projects[$index]['images'] = array_merge($projects[$index]['images'], $uploaded);
                $this->log("update() id={$id}: uploaded " . count($uploaded) . " new image(s): " . implode(',', $uploaded));
            }

            $this->log("update() id={$id}: about to save. New title=" . $projects[$index]['title']);
            $this->saveProjects($projects);
            $this->log("update() id={$id}: save OK, redirecting.");

            header('Location: /admin/projects/edit/' . $id . '?saved=1');
            exit;

        } catch (\Throwable $e) {
            $this->log("update() EXCEPTION - edit not work: " . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());

            http_response_code(500);
            $message = $e->getMessage();
            // htmlspecialchars() silently returns '' on invalid UTF-8, which is
            // what was hiding the real error before. Sanitize first so the
            // message is always visible.
            $safeMessage = htmlspecialchars($this->sanitizeUtf8($message), ENT_QUOTES, 'UTF-8');
            echo '<h1>Update Failed</h1><p>' . $safeMessage . '</p>';
            echo '<pre style="white-space:pre-wrap;color:#900;">' . htmlspecialchars((string) $e, ENT_QUOTES, 'UTF-8') . '</pre>';
        }
    }

    public function deleteImage($id)
    {
        $projects = $this->getProjects();
        $index = null;
        foreach ($projects as $i => $p) {
            if ((int)$p['id'] === (int)$id) {
                $index = $i;
                break;
            }
        }

        if ($index === null) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        $image = $_POST['image'] ?? '';
        if ($image) {
            $filtered = [];
            foreach ($projects[$index]['images'] as $img) {
                if ($img !== $image) {
                    $filtered[] = $img;
                }
            }
            $projects[$index]['images'] = $filtered;
            $this->saveProjects($projects);
        }

        header('Location: /admin/projects/edit/' . $id);
        exit;
    }

    public function destroy($id)
    {
        $projects = $this->getProjects();
        $index = null;
        foreach ($projects as $i => $p) {
            if ((int)$p['id'] === (int)$id) {
                $index = $i;
                break;
            }
        }

        if ($index === null) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        array_splice($projects, $index, 1);
        $this->saveProjects($projects);

        header('Location: /admin/projects?deleted=1');
        exit;
    }

    public function create()
    {
        echo $this->blade->render('admin.project-edit', [
            'project' => null
        ]);
    }

    public function store()
    {
        $projects = $this->getProjects();
        $maxId = 0;
        foreach ($projects as $p) {
            if ($p['id'] > $maxId) $maxId = $p['id'];
        }

        $project = [
            'id' => $maxId + 1,
            'title' => $this->sanitizedPost('title', 'New Project'),
            'short_description' => $this->sanitizedPost('short_description', ''),
            'description' => $this->sanitizedPost('description', ''),
            'images' => [],
            'category' => $this->sanitizedPost('category', 'General'),
            'location' => $this->sanitizedPost('location', ''),
            'date' => $this->sanitizedPost('date', date('Y-m-d')),
            'ad' => isset($_POST['ad']) && $_POST['ad'] === '1',
        ];

        if (!empty($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
            $project['images'] = $this->handleImageUploads();
        }

        $projects[] = $project;
        $this->saveProjects($projects);

        header('Location: /admin/projects/edit/' . $project['id'] . '?saved=1');
        exit;
    }

    protected function handleImageUploads(): array
    {
        $uploaded = [];
        $files = $_FILES['images'];
        $count = count($files['name']);

        for ($i = 0; $i < $count; $i++) {
            if ($files['error'][$i] !== UPLOAD_ERR_OK) continue;

            $ext = strtolower(pathinfo($files['name'][$i], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            if (!in_array($ext, $allowed)) continue;

            $filename = uniqid('proj_') . '.' . $ext;
            $dest = $this->imageDir . $filename;

            if (!move_uploaded_file($files['tmp_name'][$i], $dest)) continue;

            if ($ext === 'webp') {
                $uploaded[] = $filename;
                continue;
            }

            $webpName = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
            $webpDest = $this->imageDir . $webpName;

            if (extension_loaded('gd')) {
                $this->convertToWebp($dest, $webpDest);
                unlink($dest);
                $uploaded[] = $webpName;
            } elseif ($this->tryCwebp($dest, $webpDest)) {
                unlink($dest);
                $uploaded[] = $webpName;
            } else {
                $uploaded[] = $filename;
            }
        }

        return $uploaded;
    }

    protected function tryCwebp($source, $dest): bool
    {
        $escapedSource = escapeshellarg($source);
        $escapedDest = escapeshellarg($dest);
        $output = null;
        $code = null;
        exec("cwebp -q 85 $escapedSource -o $escapedDest 2>&1", $output, $code);
        return $code === 0 && file_exists($dest);
    }

    protected function convertToWebp($source, $dest)
    {
        $info = getimagesize($source);
        if (!$info) return;

        $ext = $info[2];
        switch ($ext) {
            case IMAGETYPE_JPEG:
                $img = imagecreatefromjpeg($source);
                break;
            case IMAGETYPE_PNG:
                $img = imagecreatefrompng($source);
                imagepalettetotruecolor($img);
                imagealphablending($img, true);
                imagesavealpha($img, true);
                break;
            case IMAGETYPE_GIF:
                $img = imagecreatefromgif($source);
                break;
            default:
                return;
        }

        if ($img) {
            imagewebp($img, $dest, 85);
            imagedestroy($img);
        }
    }
}