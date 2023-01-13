<?php
  $ARTICLES_PER_PAGE = 3;
  

  require_once 'php/scripts/dbaccess.php';


  function parse_markdown_as_html($text){
    // Turns one newline into <br> element, but two newlines into <p></p> element.
    $text = preg_replace("/(\n\n)/", "</p><p>", $text);
    $text = nl2br($text);

    // Markdown support for italics, bold, and underline
    $text = preg_replace("/__(.*?)__/", "<u>$1</u>", $text); // Underline; triggered with __this__
    $text = preg_replace("/\*\*(.*?)\*\*/", "<b>$1</b>", $text); // Bold; triggered with **this**
    $text = preg_replace("/\*(.*?)\*/", "<em>$1</em>", $text);  // Italics; triggered with *this*

    return $text;
  }
  

  // DB connection
  $db = get_db();
  
  // Get some general variables
  $page = get_default($_GET['p'], 1);
  $max_page = ceil($db->query("SELECT newsid FROM news")->num_rows / $ARTICLES_PER_PAGE);  // First gets total number of articles, 
  // then divides it by articles per page to get maximum page. ceil() rounds up, since, if 3.2 pages are needed, we display 4.
  
  // Send user back to proper page if max/min page have been exceeded
  if($page > $max_page){
    header('Location: ?p='.$max_page);
    exit();
  } elseif($page < 1){
    header('Location: ?p=1');
    exit();
  }

  // Fetch articles
  $range_articles_end = $page * $ARTICLES_PER_PAGE;
  $range_articles_start = $range_articles_end - $ARTICLES_PER_PAGE; 
  $sql = "SELECT * FROM news LIMIT ".$range_articles_start.",".$ARTICLES_PER_PAGE;

  $articles = $db->query($sql);

?>

<?php 
foreach($articles as $article):
  if($article['image_path']){
    // /news/2730.jpg gets turned into 2730_thumb.jpg
    $array = explode('.', $article['image_path']);
    $img_thumb = $array[0].'_thumb.'.$array[1];
  }  
?>

	<article class="pb-l-4">


		<h2 class="mb-0"> <?=parse_markdown_as_html($article['article_title'])?> </h2>
		<p class="text-muted article-info"> <?=$article['author'] . ', ' . date('d.m.Y', (int)$article['release_date'])?> </p>
		
    <?php if($article['image_path']):?>
      <a href=<?=$article['image_path']?>>
        <img class="article-image mb-2 mb-l-3" src="<?=$img_thumb?>">
      </a>
	  <?php endif;?>

		<p> <?=parse_markdown_as_html($article['article_text']); ?> </p>


	</article>
	<hr class="article-hr mt-1 mb-4">

<?php endforeach; ?>