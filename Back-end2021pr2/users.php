<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Bläddra bland kontaktannonserna</h1>
    <p>Använd gärna filtrerings och sorteringsformuläret</p>
    <p>
        <!-- Filtreringsformulär -->
    <form action="users.php" method="get">
        <!-- Radio buttons för sortering enligt förmögenhet -->
        <label for="rich">Rika först</label>
        <input type="radio" name="salary" value="rich" checked>
        <label for="poor">Rika sist</label>
        <input type="radio" name="salary" value="poor"><br>

        <label for="pop">Populära först</label>
        <input type="radio" name="likes" value="pop" checked>
        <label for="notpop">Populära sist</label>
        <input type="radio" name="likes" value="notpop"><br>

        <!-- Dropdown för preferens -->
        <label for="pref">Preference:</label>
        <select name="pref">
            <option value="0">Manlig</option>
            <option value="1">Kvinlig</option>
            <option value="2">Båda</option>
            <option value="3">Annan</option>
            <option value="4">Alla</option>
        </select>

        <input type="submit" value="Filtrera">
        
    </form>
    </p>

    <?php include "fetch.php" ?>
</article>

<?php include "footer.php" ?>