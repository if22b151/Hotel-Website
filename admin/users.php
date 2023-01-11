<?php
  $USERS_PER_PAGE = 15;
  
  
  require '../php/scripts/funcs.php';
  require '../php/scripts/dbaccess.php';


  // Prevent non-admins
  session_start();
  require_admin();

  // Connect to DB
  $db = get_db();

  // Ensure user is on correct ?p= page
  $page = get_default($_GET['p'], 1);
  $max_page = ceil($db->query("SELECT * FROM user")->num_rows / $USERS_PER_PAGE);  // First gets total number of articles, 
  // then divides it by articles per page to get maximum page. ceil() rounds up, since, if 3.2 pages are needed, we display 4. 

  if($page > $max_page){
    header('Location: ?p='.$max_page);
    exit();
  } elseif($page < 1){
    header('Location: ?p=1');
    exit();
  }

  // Get $users from DB
  $user_range_start = $USERS_PER_PAGE * ($page-1);
  $sql = 'SELECT firstname, lastname, userid, username
          FROM user JOIN person ON fk_personid = personid 
          ORDER BY lastname, firstname
          LIMIT '. $user_range_start . ',' . $USERS_PER_PAGE;

  $users = $db->query($sql)->fetch_all(MYSQLI_ASSOC);  // Return all rows as an array of associative arrays
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <?php require '../php/head.php'; ?>
  <title>Alle Nutzer</title>
</head>
<body>
  <div class="container-site d-flex flex-column justify-content-between">
    <div class="container-navbar-content d-flex flex-column flex-grow-1">

      <?php include '../php/navbar.php' ?>
      
      <div class="flex-container content-background flex-grow-1">
      <div class="container site_content py-2 pb-4">
        <h1>Nutzer</h1>

          <!-- Past Bookings -->
          <div class="mt-3">

            <table class="table">
              <thead>
                <th>#</th>
                <th>Nachname</th>
                <th>Vorname</th>
                <th>Username</th>
                <th>
                  <div class="d-flex justify-content-center"> <?=switch_page_button(-1, $page, $max_page);?> </div>
                </th>
                <th>                  
                  <div class="d-flex justify-content-center"> <?=switch_page_button(+1, $page, $max_page);?> </div>
                </th>
              </thead>
              <tbody>
                <?php foreach($users as $user): ?>
              
                <tr>
                  <td><?=$user['userid']?></td>
                  <td><?=$user['lastname']?></td>
                  <td><?=$user['firstname']?></td>
                  <td><?=$user['username']?></td>
                  <td class="text-center">
                    <a role="profil" href="<?='/user/profile.php?edit='.$user['userid']?>">P</a>
                  </td>
                  <td class="text-center">
                    <a role="buchungen" href="<?='/admin/bookings.php?user='.$user['userid']?>">B</a>
                  </td>
                </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
          </div>          

      </div>
      </div>
    </div>

  <?php include '../php/footer.php' ?>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>

