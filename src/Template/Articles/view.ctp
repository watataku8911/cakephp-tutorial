<h1><?= h($article->title) ?></h1>
<p><?= nl2br($article->body) ?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>