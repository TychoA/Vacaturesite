<!-- NAAM -->
<label for="voornaam">Voornaam</label>
<input class="input_voornaam" type="text" name="voornaam" placeholder="Voornaam" pattern="^[a-zA-Z][a-zA-Z-_\.]{1,20}$" required>

<!-- ACHTERNAAM -->
<label for="achternaam">Achternaam</label>
<input class="input_achternaam" type="text" name="achternaam" placeholder="Achternaam" pattern="[a-zA-Z0-9\s]+" required>

<!-- LOCATIE -->
<label for="locatie">Locatie</label>
<select class="input_locatie" name="locatie">
    <option value="alles">Selecteer...</option>
    <option value="Noord-Holland">Noord-Holland</option>
    <option value="Zuid-Holland">Zuid-Holland</option>
    <option value="Utrecht">Utrecht</option>
    <option value="Flevoland">Flevoland</option>
    <option value="Gelderland">Gelderland</option>
    <option value="Overijssel">Overijssel</option>
    <option value="Noord-Brabant">Noord-Brabant</option>
    <option value="Groningen">Groningen</option>
    <option value="Drenthe">Drenthe</option>
    <option value="Friesland">Friesland</option>
    <option value="Limburg">Limburg</option>
    <option value="Zeeland">Zeeland</option>
    <option value="Internationaal">Internationaal</option>
</select>

<!-- EMAIL -->
<label for="gebruikersnaam">E-mail</label>
<input class="input_gebruikersnaam" type="email" name="gebruikersnaam" placeholder="E-mail" required>

<!-- TELEFOON -->
<label for="telefoon">Telefoon</label>
<input class="input_telefoon" type="text" name="telefoon" placeholder="Telefoonnummer" pattern="^[0-9]{10}" maxlength="10" required>

<!-- WACHTWOORD -->
<label for="wachtwoord">Wachtwoord</label>
<input class="input_wachtwoord" type="password" name="wachtwoord" placeholder="Wachtwoord" required> 

<input type="submit" class="login_button" value="Registreer" </input>