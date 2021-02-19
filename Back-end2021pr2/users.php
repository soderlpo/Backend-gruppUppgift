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
        <input type="radio" name="salary" value="rich">
        <label for="poor">Rika sist</label>
        <input type="radio" name="salary" value="poor"><br>

        <label for="rich">Populära först</label>
        <input type="radio" name="likes" value="pop">
        <label for="notpop">Populära sist</label>
        <input type="radio" name="likes" value="notpop"><br>

        <!-- Dropdown för preferens -->
        <label for="pref">Preference:</label>

        <select name="pref">
            <option value="male">Manlig</option>
            <option value="female">Kvinlig</option>
            <option value="both">Båda</option>
            <option value="other">Annan</option>
            <option value="all">Alla</option>
        </select>

        <input type="submit" value="Filtrera">
        
    </form>
    </p>

    
    <?php include "fetch.php" ?>
</article>

<?php include "footer.php" ?>