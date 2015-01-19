<!-- NAAM -->
<label for="voornaam">Voornaam</label>
<input class="input_voornaam" type="text" name="voornaam" placeholder="Voornaam" pattern="^[a-zA-Z][a-zA-Z-_\.]{1,20}$" required>

<!-- ACHTERNAAM -->
<label for="achternaam">Achternaam</label>
<input class="input_achternaam" type="text" name="achternaam" placeholder="Achternaam" pattern="^[a-zA-Z][a-zA-Z-_\.]{1,30}$" required>

<!-- PLAATSNAAM -->
<label for="plaatsnaam">Plaatsnaam</label>
<input class="input_plaatsnaam" type="text" name="plaatsnaam" placeholder="Plaatsnaam" pattern="^[a-zA-Z][a-zA-Z-_\.]{1,30}$" required>

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