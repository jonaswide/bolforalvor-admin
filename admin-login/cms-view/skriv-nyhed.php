<form method="POST" enctype="multipart/form-data" action="write-news.php">
	<span class="input-group-btn">
        <span class="btn btn-default btn-file">
            <input type="file" name="photo">
        </span>
    </span>
    <br>
    <input type="text" class="form-control" name="author" placeholder="Forfatter" required>
	<br>
    <input type="text" class="form-control" name="title" placeholder="Skriv titel" required>
	<br>
	<textarea class="form-control" rows="3" name="text" placeholder="Skriv tekst" required></textarea>
	<input type="submit" class="btn btn-primary" value="Skriv nyhed">
</form>

<a target="_blank" href="../nyheder.php" class="btn btn-default">Gå til nyhedsside</a>

<?php
    if (isset($_GET['error']) || isset($_GET['besked'])) {
        if ($_GET['error'] >= 1 && $_GET['error'] <= 3) {
        	print("<p class='error'>Kunne ikke skrive artikel.</p>");
        } elseif ($_GET['besked'] = 'succes') {
        	print("<p class='succes'>Artikel er oprettet.</p>");
        }
    }
?>