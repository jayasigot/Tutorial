<?php require_once('includes/header.php'); ?>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
// SUCCESS - POST WORKS!
	if (!empty($_POST['user_name']) && !empty($_POST['user_hero']) && !empty($_POST['user_bio'])){
		// SUCCESS - NO FIELDS ARE EMPTY!
		// SANITIZE DATA HERE!

		$user_name = $_POST['user_name'];
		$user_hero = $_POST['user_hero'];
		$bio = $_POST['user_bio'];

		function cleandata($data, $special_chars){
			$data = strip_tags($data);
			$data = htmlspecialchars($data, ENT_QUOTES,'UTF-8');
			$data = preg_replace($special_chars, '', $data);
			return $data;
		}

		// Might be better for general text input
		$special_chars_1 = "/[^a-z0-9\-]/i";
		// Better for an email address
        $special_chars_2 = "/[^a-z0-9\-@_.]/i";



		$user_name = cleandata($user_name,$special_chars_1);
		$user_hero = cleandata($user_hero,$special_chars_2);
		$bio = cleandata($phone,$special_chars_3);

		$myname = cleandata($user_name, '/[^a-z0-9\-]/i');
		// THIS IS MY SANITIZED NAME

		function format_name($name) {
			// strtolower() converts characters in a string to lowercase
			$name = strtolower($name);
			// ucwords() converts the first characters in each word of a string to uppercase
			$name = ucwords($name);
			// return $name to the function call
			return $name;
		}

		$user_name = format_name($myname);

		// THESE ARE MY UPPERCASE NAMES


		// ASSOCIATIVE ARRAY
	$myheroes = [
        'power_maiden' => [
            'name' => "Power Maiden",
            'picture' => "images/superheroes/power-maiden.png",
            'bio' => "Power Maiden is amazing!"
        ],
        'super-duper-man'=> [
            'name' => "Super Duper Man",
            'picture' => "images/superheroes/super-duper-man.png",
            'bio' => "Super Duper Man is the best!"
        ],
        'dr_goliath'=> [
            'name' => "Dr Goliath",
            'picture' => "images/superheroes/dr-goliath.png",
            'bio' => "Dr Goliath blah blah blah"
        ],
        'ironjaw'=> [
            'name' => "Ironjaw",
            'picture' => "images/superheroes/ironjaw.png",
            'bio' => "blah blah "
        ], 'shroud'=> [
            'name' => "Shroud",
            'picture' => "images/superheroes/shroud.png",
            'bio' => "blah blah"
        ], 'brainio'=> [
            'name' => "Brainio",
            'picture' => "images/superheroes/brainio.png",
            'bio' => "blah blah"
        ]
    ];

		// SET COOKIE MONSTER TO Sidekick
		$sidekick =
		[
			'name' => "Cookie Monster",
			'picture' => "images/sidekicks/cookie-monster.png",
			'bio' => "blah blah blah"
		];

	$mynemesislist = [
			[
            'name' => "Donald Trump",
            'picture' => "images/nemesis/donald-trump.png",
            'bio' => "blah blah"
			],
			[
            'name' => "Shriek",
            'picture' => "images/nemesis/shriek.png",
            'bio' => "blah blah"
			],
			[
            'name' => "Tricolops",
            'picture' => "images/nemesis/tricolops.png",
            'bio' => "blah blah blah"
			]
		];

		// BEGIN RANDOMIZING HERE

		$nemesis = $mynemesislist[rand(0,2)];

	} else {
		// SEND ERROR THAT ONE OR MORE FIELDS ARE EMPTY
		header('Location: step_one.php?errors=missinginfo');
	}	// END INNER IF STATEMENT
} else {
	// SEND ERROR MESSAGE THROUGH GET
	header('Location: step_one.php?errors=postnotworking');
} // END HIGH LEVEL IF

?>

<!-- Greeting Message -->
<main>
   <h2> Welcome </h2>
    <p> Howdy <?php echo "{$user_name}" ?>,</p>
    <p>Thank you for volunteering as a sidekick for The League of Heroes - we’re excited to have you on our team. Our very fancy Superhero Sidekick Selection System has processed the information you provided, and we’re pleased to announce that you have been paired with your <?php echo[$user_hero]?>. Take a look below to see which nemesis you will be working to defeat.</p>



</main>


<!-- Card Area (x3) -->
<div class="row">
<div class="card-body">
<div class="card1" >

        <h3 class="card-title1">Superhero</h3>
			<!-- <p class="card-text">The names, images and bios could be stored in a variable as a ‘list’. Based on the user’s favourite hero selection, your script should read the correct superhero data from a pool of 6.</p> -->
				<ul>
					<li><img src="<?php echo $myheroes[$user_hero]['picture'] ?>" class="superheroes" alt="Superheroes">
					  <!-- user picks --></li>
					<li><?php echo $myheroes[$user_hero]['name']?></li>
					<li><?php echo $myheroes[$user_hero]['bio']?></li>
				</ul>
		</div>
<div class="card2">
	<main>
		<h1>Superhero Sidekick Selection System</h1>
	<p>	Thank you for volunteering as a sidekick for the League of Heroes - we're excited to have you on our team. Our fancy Superhero Sidekick Selection System has processed the information you provided, and we're pleased to announce that you have been paired with your {favorite superhero}. Take a look below to see which nemesis you will be working to defeat. </p>
	<p>May the forks be with you!!</p>
	<p> <i>The League of Heroes</i> </p>

	</main>


        <h3 class="card-title2">Sidekick</h3>
			<!-- <p class="card-text">The names, images and bios could be stored in a variable as a ‘list’. Based on the user’s favourite hero selection, your script should read the correct superhero data from a pool of 6.</p> -->
			<ul>
				  <!-- user selects -->
				<li><img src="<?php echo $sidekick['picture']?>" class="" alt=""></li>
				<li>{She is a pony!! Hilarious}</li>
			</ul>
		</div>
<div class="card3">

        <h3 class="card-title3">Nemesis</h3>
			<!-- <p class="card-text">The names, images and bios could be stored in a variable as a ‘list’. Based on the user’s favourite hero selection, your script should read the correct superhero data from a pool of 6.</p> -->
			<ul>
				<li><img src="<?php echo $nemesis['picture']?>" class="nemesis" alt="Nemesis"></li>
				<li>{Donald-Trump}</li>
				<li>{He has a really bright comb-over. It's iconic!!}</li>
			</ul>
		</div>
    </div>
</div>
<a href="step_one.php" class="btn btn-primary">Play Again?</a>

<?php require_once('includes/footer.php'); ?>
