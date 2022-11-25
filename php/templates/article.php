<article>
  <h2 class="mb-0">Title</h2>
  <p class="text-muted"> <?php echo $article['author'] . ',' . $article['time']; ?> </p>
  <p> <?php echo nl2br($article['text']); ?> </p>
</article>