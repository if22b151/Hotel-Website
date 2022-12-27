<?php
  $ARTICLES_PER_PAGE = 3;
  
  require('scripts/dbaccess.php');
  
  // DB connection
  $db = get_db();
  
  // Get some general variables
  $page = isset($_GET['p']) ? $_GET['p'] : 1;
  $max_page = ceil($db->query("SELECT newsid FROM news")->num_rows / $ARTICLES_PER_PAGE);  // First gets total number of articles, 
  // then divides it by articles per page to get maximum page. ceil() rounds up, since, if 3.2 pages are needed, we display 4.
  
  // Send user back to proper page if max/min page have been exceeded
  /* if($page > $max_page){
    header('Location: ?p='.$max_page);
    exit();
  } elseif($page < 1){
    header('Location: ?p=1');
    exit();
  } */

  // Fetch articles
  $range_articles_end = $page * $ARTICLES_PER_PAGE;
  $range_articles_start = $range_articles_end - $ARTICLES_PER_PAGE; 
  $sql = "SELECT release_date, image_path, article_title, article_text, CONCAT(person.firstname, \" \", person.lastname) AS author
          FROM `news` 
          JOIN `user` ON `news`.`fk_userid` = `user`.`userid` 
          JOIN `person` ON `user`.`fk_personid` = `person`.`Personid` 
          ORDER BY `release_date` DESC
          LIMIT ".$range_articles_start.",".$range_articles_end;

  $articles = $db->query($sql);

function html_from_text($text){
    // Turns one newline into <br> element, but two newlines into <p></p> element.
    $text = preg_replace("/(\n\n)/", "</p><p>", $text);
    $text = nl2br($text);

    // Markdown support for italics and bold
    $text = preg_replace("/__(.*?)__|\*(.*?)\*/", "<em>$1$2</em>", $text);  // Italics; triggered with __this__ or *this*
    $text = preg_replace("/\*\*(.*?)\*\*/", "<b>$1</b>", $text); // Bold; triggered with **this**

    return $text;
  }
?>

<?php foreach($articles as $article):?>

	<article>
		<h2 class="mb-0"> <?=$article['article_title']?> </h2>
		<p class="text-muted article-info"> <?=$article['author'] . ', ' . date('d.m.Y', (int)$article['release_date'])?> </p>
		<?php if($article['image_path']):?>
		  <img class="article-image mb-2 mb-l-3" href=<?=$article['image_path']?> src="<?=$article['image_path']?>">
		<?php endif;?>
		<p> <?php echo html_from_text($article['article_text']); ?> </p>
	</article>
	<hr>

<?php endforeach; ?>