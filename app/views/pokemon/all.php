<body class='home'>
    
<h2 class='titre'>Choisissez votre pokemon</h2>
<div class='allpokemon'>
    <div class='swiper mySwiper'>
        <div class='swiper-wrapper'>
            <?php foreach ($pokemons as $index => $pokemon): ?>
                <div class='swiper-slide'>
                    <div class='card'>
                        <a href='/pokemon/combat/<?= $pokemon['id'] ?>'>
                            <h2><?= $pokemon['nom'] ?></h2>
                            <img src='<?= $pokemon['img'] ?>' alt='<?= $pokemon['nom'] ?>'>
                            <p>Type: <?= $pokemon['type'] ?></p>
                            <p>PV: <?= $pokemon['pointsdevie'] ?></p>
                            <div class='ATKDEF'>
                                <p class='ATKDEF_item'>ATK: <?= $pokemon['attaque'] ?></p>
                                <p class='ATKDEF_item'>DEF: <?= $pokemon['defense'] ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class='swiper-pagination'></div>
    </div>
</div>

</body>