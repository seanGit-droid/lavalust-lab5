<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Student Home Page'; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f6f9; color: #333; }
        .nav { margin-bottom: 20px; }
        .nav a { margin-right: 15px; text-decoration: none; color: #007bff; font-weight: bold; }
        .nav a:hover { text-decoration: underline; }
        .card { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); width: 480px; max-width: 100%; }
        h1 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-top: 0; }
        p { margin: 10px 0; font-size: 15px; line-height: 1.5; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 4px; font-size: 13px; font-weight: bold; margin-bottom: 15px; }
        .badge-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .badge-warning { background: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
        .btn { display: inline-block; padding: 9px 18px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 14px; margin-right: 10px; margin-top: 10px; }
        .btn-primary { background: #007bff; color: white; }
        .btn-primary:hover { background: #0056b3; }
        .btn-success { background: #28a745; color: white; }
        .btn-success:hover { background: #218838; }
        .btn-outline { background: transparent; color: #007bff; border: 1px solid #007bff; }
        .btn-outline:hover { background: #f0f7ff; }
        .btn-danger { color: #dc3545; text-decoration: none; font-weight: bold; margin-top: 15px; display: inline-block; }
        .btn-danger:hover { text-decoration: underline; }
        .actions { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="nav">
        <a href="<?= site_url(''); ?>">Welcome</a> |
        <a href="<?= site_url('student'); ?>" style="color: #0056b3;">Home</a> |
        <a href="<?= site_url('student/profile'); ?>">Student Profile</a> |
        <a href="<?= site_url('products'); ?>">Products</a>
    </div>

    <div class="card">
        <h1>Student Portal</h1>
        <p>Welcome to the LavaLust Student Module.</p>

        <?php $has_access = isset($_SESSION['student_access']) && $_SESSION['student_access'] === true; ?>

        <?php if ($has_access): ?>
            <div class="badge badge-success">✓ Student Access: Granted</div>
            <p>You currently have active student authorization. You can access the student profile protected by <code>StudentMiddleware</code>.</p>
            <div class="actions">
                <a href="<?= site_url('student/profile'); ?>" class="btn btn-primary">Go to Student Profile →</a>
                <br>
                <a href="<?= site_url('student/logout'); ?>" class="btn-danger">Revoke Access & Logout</a>
            </div>
        <?php else: ?>
            <div class="badge badge-warning">⚠ Student Access: Restricted</div>
            <p>Access to <code>/student/profile</code> is protected by <code>StudentMiddleware</code>. Visiting the profile route directly without authorization will redirect you back here.</p>
            <div class="actions">
                <a href="<?= site_url('student/login'); ?>" class="btn btn-success">Grant Student Access (Login)</a>
                <a href="<?= site_url('student/profile'); ?>" class="btn btn-outline">Test Profile Access</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
