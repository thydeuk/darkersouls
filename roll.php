<?php 
//Defining the arrays
$arr = array(
	"Class: "=>array("Knight" => 1, "Mercenary" => 1, "Warrior" => 1, "Herald" => 1, "Thief" => 1, "Assassin" => 1, "Sorcerer" => 1, "Pyromancer" => 1, "Cleric" => 1, "Deprived" => 2),
	"Weapon: "=>array("Axe"=>2, "Bow"=>5, "Crossbow"=>5, "Curved Sword"=>2, "Curved Greatsword"=>3, "Dagger"=>2, "Fist"=>2, "Great Hammer"=>3, "Greataxe"=>3, "Greatsword"=>3, "Halberd"=>3, "Hammer"=>2, "Katana"=>2, "Pyromancy Flame"=>2, "Piercing Sword"=>2, "Reaper"=>2, "Sacred Chime"=>2, "Spear"=>2, "Staff"=>2, "Straight Sword"=>2, "Talisman"=>2, "Ultra Greatsword"=>3, "Whip"=>2),
	"Rule: "=>array("No consumables"=>8, "No shields"=>6),
	"Roll: "=>array("No Roll"=>10, "Fat Roll only"=>7),
	"Rings: "=>array("Max 3 Rings"=>3, "Max 2 Rings"=>5, "1 Ring Only"=>7, "No Rings"=>10),
	"Max Level: "=>array("SL10"=>7, "No Leveling"=>8, "SL15"=>6, "SL20"=>5, "SL25"=>4, "SL30"=>3, "SL40"=>2, "SL50"=>1),
	"Upgrade: "=>array("Max +9 Weapon"=>1, "Max +8 Weapon"=>2, "Max +7 Weapon"=>3, "Max +6 Weapon"=>4, "Max +5 Weapon"=>5, "Max +4 Weapon"=>6, "Max +3 Weapon"=>7,"Max +2 Weapon"=>8,"Max +1 Weapon"=>9,"No Upgrading Weapon"=>10),
	"Element: "=>array("Refined Weapon"=>2, "Raw Weapon"=>2, "Fire Weapon"=>2, "Heavy Weapon"=>2, "Sharp Weapon"=>2, "Poison Weapon"=>2, "Crystal Weapon"=>2, "Blessed Weapon"=>2, "Deep Weapon"=>2, "Dark Weapon"=>2, "Blood Weapon"=>2, "Hollow Weapon"=>2, "Lightning Weapon"=>2, "Simple Weapon"=>2, "Chaos Weapon"=>2),
	"Estus: "=>array("14 Estus Max"=>1, "13 Estus Max"=>1, "12 Estus Max"=>2, "11 Estus Max"=>2, "10 Estus Max"=>3, "9 Estus Max"=>4, "8 Estus Max"=>5,"7 Estus Max"=>6, "6 Estus Max"=>7, "5 Estus Max"=>8, "4 Estus Max"=>9, "3 Estus Max"=>10, "2 Estus Max"=>12, "1 Estus Max"=>14, "No Estus" =>15),
	"Armor: "=>array("Cosplay: Solaire"=>4, "Cosplay: Catarina"=>4, "Cosplay: Smough"=>4, "Silver Knight Armor"=>3, "Black Knight Armor"=>3, "Dancers Armor"=>3, "Faaram Armor"=>3, "Armor of Thorns"=>3, "Winged Knight Armour"=>5, "Outrider Knight Armor"=>4, "Naked"=>10, "Starting Armor"=>4)
);


//Defining variables
$x = 0;
$res = array();
$class=0;
$weapon=0;
$xx=0;
$weapon = $_POST['weapon'];
$class = $_POST['class'];
$level = $_POST['level'];


//Pulling the difficulty indicator from the $_POST
switch($_POST['mod']) {
	case 1: $max=5; break;
	case 2: $max=8; break;
	case 3: $max=13; break;
	case 4: $max=19; break;
	case 5: $max=26; break;
	default: $max=8; 
}


//While the $x is less than the difficulty total (5, 8, 13, 19 or 26)
while ($x<$max) {
	
//Checks to see if user has clicked "Always roll class", or "Always tell me what weapon to use" boxes
	if ($class=="on") {
		$y = "Class: ";
		$class="off";	
	} else if ($weapon=="on") {
		$y = "Weapon: ";
		$weapon="off";
	} else if ($level=="on") {
		$y = "Max Level: ";
		$level="off";
	} else {
		//If not, then pick a random array
		$y = array_rand($arr);
	}
	
	//This searches for random values inside the array. For example inside the Class array this would pick Knight, Mercenary, Warrior, etc.
	$z = array_rand($arr[$y]);
	
	//Only pick the option if it fits within the difficulty limiter
	if ($x+$arr[$y][$z]<=$max) {
		$x+=$arr[$y][$z];
		$res[$z] = array("type"=>$y,"value"=>$arr[$y][$z]);
		
		//If the array isn't "Rule", this will unset the whole array that's picked so it can't be picked again
		if ($y!='Rule: ') { unset($arr[$y]); }
		//If the array is "Rule" this will unset the value inside the array, so more rules can be picked but duplicates won't be
		if ($y=='Rule: ') { unset($arr[$y][$z]); }
		
	//Else reroll the choice
	} else {
		$xx+=1;
		if ($y == "Max Level: ") {
			$level="on";
		} else if ($y == "Weapon: ") {
			$weapon="on";
		} else if ($y == "Class: ") {
			$class="on";
		}
	}
	//If it can't find a value that fits within the difficulty after 20 attempts it breaks, this is to avoid PHP crashing.
	if ($xx>=20) {
		break;
	}
//end of while loop	
}

//Echo the results
foreach ($res as $key=>$var) {
	if ($var['type']!="Class: " && $var['type']!="Weapon: " && $var['type']!="Max Level: ") { $var['type'] = ""; }
	echo $var['type']." ".$key." (".$var['value'].")<br />";
}

