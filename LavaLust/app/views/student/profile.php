<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Student Profile'; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f6f9; color: #333; }
        .nav { margin-bottom: 20px; }
        .nav a { margin-right: 15px; text-decoration: none; color: #007bff; font-weight: bold; }
        .nav a:hover { text-decoration: underline; }
        .card { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); width: 450px; max-width: 100%; }
        h1 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-top: 0; }
        p { margin: 10px 0; font-size: 15px; }
        strong { color: #555; }
        .badge { display: inline-block; background: #28a745; color: white; padding: 3px 8px; border-radius: 4px; font-size: 12px; margin-bottom: 15px; }
        .btn-logout { display: inline-block; margin-top: 15px; color: #dc3545; text-decoration: none; font-weight: bold; }
        .btn-logout:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="nav">
        <a href="<?= site_url(''); ?>">Welcome</a> |
        <a href="<?= site_url('student'); ?>">Home</a> |
        <a href="<?= site_url('student/profile'); ?>" style="color: #0056b3;">Student Profile</a> |
        <a href="<?= site_url('products'); ?>">Products</a>
    </div>
    <div class="card">
        <h1>Student Information</h1>
        <div class="badge">✓ Access Verified via StudentMiddleware</div>
        <p><strong>Student ID:</strong> <?= $student_id ?? ''; ?></p>
        <p><strong>Name:</strong> <?= $name ?? ''; ?></p>
        <p><strong>Course:</strong> <?= $course ?? ''; ?></p>
        <p><strong>Year Level:</strong> <?= $year ?? ''; ?></p>
        <p><strong>Section:</strong> <?= $section ?? ''; ?></p>
        <p><strong>Email:</strong> <?= $email ?? ''; ?></p>
        <p><strong>Skills:</strong> <?= $skills ?? ''; ?></p>
        <br>
        <a href="<?= site_url('student/logout'); ?>" class="btn-logout">Revoke Access & Logout</a>
    </div>
</body>
</html>
