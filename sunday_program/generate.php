<?php
$chores = array(
    "Opening prayer" => null,
    "Praise and worship" => null,
    "Worship" => null,
    "Hymn" => null,
    "Bible reading" => null,
    "2nd hymn" => null,
    "Choir" => null,
    "Sermon/activity of the day" => null,
    "Prayer" => null,
    "Offering" => null,
    "Closing prayer" => null
);

$names = array("Ayo_Ale", "Tayo_Ale", "Darasimi_Ale", "Moses_ogunjobi", "Elizabeth_Ogunjobi", "Esther_Oloruntoba", "Mary_Oloruntoba", "Heritage_Adu", "Kemi_Oloniyo", "Jumoke_Ogbondeminu", "Samuel", "Iyanu_Oloruntosin", "Ini_Oloruntosin", "Joshua");

$permanentAssignments = array(
    "Choir" => "CEU choir",
    "Sermon/activity of the day" => "The teacher call"
);

if (isset($_POST['new_names']) && !empty($_POST['new_names'])) {
    $new_names = $_POST['new_names'];
    $new_names = explode(',', $new_names);
    $names = array_merge($names, $new_names);

    file_put_contents('names.txt', implode(',', $names));
    echo "Names added successfully.";
}
if (file_exists('names.txt')) {
    $names = file_get_contents('names.txt');
    $names = explode(',', $names);
}

$randomAssignments = array_diff($names, $permanentAssignments);
$choreAssignments = array();

foreach ($chores as $chore => $name) {
    if (array_key_exists($chore, $permanentAssignments)) {
        $choreAssignments[] = "$chore - {$permanentAssignments[$chore]}";
    } else {
        $randomIndex = array_rand($randomAssignments);
        $assignedName = $randomAssignments[$randomIndex];
        $choreAssignments[] = "$chore - $assignedName";
        unset($randomAssignments[$randomIndex]); // Ensure each name is used only once
    }

}

echo "<ol>";
foreach ($choreAssignments as $assignment) {
    echo "<li>$assignment</li>";
}
echo "</ol>";
?>
