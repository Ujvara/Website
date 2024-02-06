<?php
$page = 'index';
$limit = 5;
$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page_number = max(1, $page_number);
$start = ($page_number - 1) * $limit;

require_once "./header.php";
require_once "./lib/Auth.php";
require_once "./lib/Dashboard.php";

if (!Auth::isAdmin()) {
    header('Location: /home.php');
    exit();
}

$error = false;

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'contact.delete':
        case 'place.delete':
        case 'user.delete':
            if (!isset($_REQUEST['id'])) {
                $error = 'Invalid request. Missing ID.';
                break;
            }
            require_once "./lib/Contact.php";
            require_once "./lib/Place.php";
            require_once "./lib/User.php";
            
            switch ($_REQUEST['action']) {
                case 'contact.delete':
                    $valid = Contact::delete($_REQUEST['id']);
                    if (!$valid) {
                        $error = 'Deleting Contact failed.';
                    }
                    break;
                case 'place.delete':
                    $valid = Place::delete($_REQUEST['id']);
                    if (!$valid) {
                        $error = 'Deleting Place failed.';
                    }
                    break;
                case 'user.delete':
                    $valid = User::delete($_REQUEST['id']);
                    if (!$valid) {
                        $error = 'Deleting User failed.';
                    } else {
                        
                        header('Location: /dashboard.php');
                        exit();
                    }
                    break;
            }
    }
}


$search_query = isset($_GET['search']) ? trim(htmlspecialchars($_GET['search'])) : '';


$users = Dashboard::searchUsers($search_query, $start, $limit);
$total_users = Dashboard::countUsers($search_query);
$total_pages = ceil($total_users / $limit);


$adminData = [
    "name"=>"Ujvara",
    "surname"=>"Kuleta",
    "username"=>"ujvarak",
    "email"=>"uk@ubt-uni.net",
    "password" => "Ujvara.123",
    "confirmpassword" => "Ujvara.123",
    "role"=>"admin"
];

$user1Data = [
    "name"=>"Lend",
    "surname"=>"Haliti",
    "username"=>"lendh",
    "email"=>"lh@ubt-uni.net",
    "password" => "Lend.123",
    "confirmpassword" => "Lend.123",
    "role"=>"user"
];

$user2Data = [
    "name"=>"Buna",
    "surname"=>"Berisha",
    "username"=>"bunab",
    "email"=>"bb@ubt-uni.net",
    "password" => "Buna.123",
    "confirmpassword" => "Buna.123",
    "role"=>"user"
];
$userRepository = new UserRepository();
$userRepository->insertUser($adminData);
$userRepository->insertUser($user1Data);
$userRepository->insertUser($user2Data);
?>


<h1 id="dashboard-text">Admin Dashboard</h1>

<div class="container">
    <div class="admin-links">
        <form action="" method="get">
            <input type="text" name="search" value="<?php echo $search_query; ?>" placeholder="Search by name or email" />
            <input type="submit" value="Search" />
        </form>
    </div>

    <h1 class="dashboard-h1"> Users </h1>

    
    <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>

    <table class="table-1">
        <tr>
            <th class="rows">Name</th>
            <th class="rows">Email</th>
            <th class="rows">Password</th>
            <th class="rows">Role</th>
            <th class="rows">Delete</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td class="table-data"><?php echo htmlspecialchars($user['name']); ?></td>
                <td class="table-data"><?php echo htmlspecialchars($user['email']); ?></td>
                <td class="table-data"><?php echo htmlspecialchars($user['password']); ?></td>
                <td class="table-data"><?php echo htmlspecialchars($user['role']); ?></td>
                <td class="table-data">
                    <a href="/dashboard.php?action=user.delete&id=<?php echo $user['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?><?php echo isset($search_query) ? '&search=' . $search_query : ''; ?>" class="<?php if ($i == $page_number) echo 'active'; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</div>

<?php require_once "./footer.php"; ?>

