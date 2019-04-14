<?php require_once('includes/header.php'); ?>

	<main>
			<form action="step_two.php" method="post">
				<?php if ((isset($_GET['errors'])) && ($_GET['errors'] == 'missinginfo')) { ?>
					<div class="input-row">
						<p>Sorry, we can't turn you into a crime-fighting sidekick without all of the information. Try again!</p>
					</div>
				<?php } ?>
				<div class="input-row">
					<label for="first_name">Sidekick Name:</label>
					<input type="text" name="user_name" id="first_name" placeholder="Enter your first name">
				</div>
				<div class="input-row">
					<label for="first_name">Pick Your Favourite Superhero:</label>
						<select class="input-selection" name="user_hero">
							<option value="power_maiden">Power Maiden</option>
							<option value="super-duper-man">Super Duper Man</option>
							<option value="dr_goliath">Dr Goliath</option>
							<option value="ironjaw">Ironjaw</option>
							<option value="shroud">Shroud</option>
							<option value="brainio">Brainio</option>
						</select>
				</div>
				<div class="input-row">
					<label for="bio">Sidekick Bio:</label>
					<textarea name="user_bio" id="bio" maxlength="140" placeholder="Enter your bio"></textarea>
				</div>
				<div class="input-row">
					<input type="submit" value="Select Sidekick">
					<input type="reset" value="Reset">
				</div>
			</form>
		</div>
	</main>
<?php require_once('includes/footer.php'); ?>
