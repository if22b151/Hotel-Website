<?php
  $articles_per_page = 3;

	$articles = array(
		array(
			'id'=>111111,
			'title'=>'Title 1',
			'author'=>'Sabine Eins',
			'time'=>'28.09.2001',
			'text'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ducimus quasi odit autem debitis. Neque nobis nam ipsa, harum assumenda nesciunt corporis veniam porro non sequi. Dolores quasi'
		),
		array(
			'id'=>222222,
			'title'=>'Title 2',
			'author'=>'Sabine Zwei',
			'time'=>'28.09.2002',
			'text'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ducimus quasi odit autem debitis. Neque nobis nam ipsa, harum assumenda nesciunt corporis veniam porro non sequi. Dolores quasi'
		),
		array(
			'id'=>333333,
			'title'=>'Title 3',
			'author'=>'Sabine Drei',
			'time'=>'28.09.2003',
			'text'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ducimus quasi odit autem debitis. Neque nobis nam ipsa, harum assumenda nesciunt corporis veniam porro non sequi. Dolores quasi'
		),
	)
?>

<?php foreach($articles as $article): ?>


	<article>
		<h2 class="mb-0">Title</h2>
		<p class="text-muted"> <?php echo $article['author'] . ',' . $article['time']; ?> </p>
		<p> <?php echo nl2br($article['text']); ?> </p>
	</article>
	<hr>


<?php endforeach; ?>