<main>
    <section>
        <img 
            src="<?= $poster_url; ?>" 
            alt="Poster de <?= $title; ?>" 
            width="200" style="border-radius: 24px"
        >
    </section>

    <hgroup>
        <h3><?= $title; ?> - <?= $until_Message; ?></h3>
        <p>Fecha estreno: <?= $release_date; ?></p>
        <p>la siguiente es: <?= $following_production; ?></p>
    </hgroup>
</main>