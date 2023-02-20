<?php
/**
 * Praktikum DBWT. Autoren:
 * Pei Qi, Lim, 3530737
 * Shuyang, Zhang, 3270926
 */
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';

$allergens = [
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch'
];

$de = [
    1 => 'Gericht: ',
    2 => 'Allergene: ',
    3 => 'Preise: ',
    4 => 'Intern: ',
    5 => 'Extern ',
    6 => 'Beschreibung anzeigen? ',
    7 => 'Sprache'.'auswählen',
    8 => 'Deutsch',
    9 => 'Englisch',
    10 => "Suchen",
    11 => 'Text',
    12 => 'Sterne',
    13 => 'Autor',
    14 =>'Bewertungen(Insgesamt: ',
    15=>'beschreiben anzeigen'
];

$en = [
    1 => 'Dish: ',
    2 => 'Allergens ',
    3 => 'Price: ',
    4 => 'internal: ',
    5 => 'external: ',
    6 => 'Show description? ',
    7 => 'Choose'.'language',
    8 => 'German',
    9 => 'English',
    10 => 'Search',
    11 => 'Text',
    12 => 'Stars',
    13 => 'Author',
    14 =>'Assessment (Total',
    15=>'show description'
];

$meal = [
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => 2.90,
    'price_extern' => 3.90,
    'allergens' => [11, 13],
    'amount' => 42           // Number of available meals
];

$ratings = [
    [   'text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2 ],
    [   'text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4 ],
    [   'text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4 ],
    [   'text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3 ]
];

function showstar($number){
    for($i=0;$i<$number;$i++){
        echo '★';
    }
}

function showallergen(array $meal ,array $allergens){
    echo"<ul>";
    foreach ($meal['allergens'] as $value){
        echo"<li> $allergens[$value] </li>";
    }
    echo"</ul>";
}

$showRatings = [];
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
    $searchTerm = strtoupper($_GET[GET_PARAM_SEARCH_TEXT]);
    foreach ($ratings as $rating) {
        $nokleine=strtoupper( $rating['text']);
        if (strpos($nokleine, $searchTerm) !== false) {
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_MIN_STARS])) {
    $minStars = $_GET[GET_PARAM_MIN_STARS];
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $minStars) {
            $showRatings[] = $rating;
        }
    }
} else if( isset($_GET['most'])){
    $start=$ratings[0]['stars'];
    if($_GET['most']=='top'){
        foreach ($ratings as $rating){
            if($rating['stars']>=$start){
                $start=$rating['stars'];
            }}

        foreach ($ratings as $rating){
            if($rating['stars']==$start){
                $showRatings[]=$rating;
            }
        }
    }
    else{
        foreach ($ratings as $rating){
            if($rating['stars']<=$start){
                $start=$rating['stars'];
            }}
        foreach ($ratings as $rating){
            if($rating['stars']==$start){
                $showRatings[]=$rating;
            }
        }
    }
}else {
    $showRatings = $ratings;
}

function calcMeanStars(array $ratings) : float {
    $sum = 0;
    foreach ($ratings as $rating) {
        $sum += $rating['stars'] / count($ratings);
    }
    return $sum;
}

function chooselanguage($number){
    global $en,$de;
    if(isset($_GET['language'])){
        if($_GET['language']=='en'){
            echo $en[$number];
        }else{
            echo $de[$number];
        }
    }else{
        echo $de[$number];
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <title>Gericht: <?php echo $meal['name']; ?></title>
    <style>
        * {
            font-family: Arial, serif;
        }
        .rating {
            color: darkgray;
        }
    </style>
</head>
<body>
<form method="get">
    <label for="en"><?php  chooselanguage(9);        ?></label>
    <input type="radio" name="language" value="en" id="en">
    <label for="de"><?php  chooselanguage(8);        ?></label>
    <input type="radio" name="language" value="de" id="de">
    <input type="submit" value=<?php chooselanguage(7);?>>
</form>
<h1> <?php chooselanguage(1);echo $meal['name']; ?></h1>
<?php
chooselanguage(3);
?>
<br>
<?php
chooselanguage(4);
echo round($meal['price_intern'],2).'€'.'<br>';
chooselanguage(5);
echo round($meal['price_extern'],2).'€'.'<br>';
?>
<form method="get">
    <label for="show_description"> <?php chooselanguage(15); ?></label>
    <input type="hidden" name="show_description" value="0">
    <input type="radio" id="show_description" name="show_description" value="1">
    <br>
    <input type="submit" value="confirm">
    <?php
    if(!empty($_GET['show_description'])) {
        if ($_GET['show_description'] == 1) {
            echo "<p>" . $meal['description'] . "</p>";
        }
    }
    ?>
</form>

<h1> <?php chooselanguage(14); echo calcMeanStars($ratings); ?>)</h1>
<?php
chooselanguage(2) ;echo  "<br>";
showallergen($meal,$allergens);
?>
<form method="get">
    <label for="search_text">Filter:</label>

    <input type='text' name='search_text' id='search_text' value=<?php if(!isset($_GET['search_text'])){echo null;}
    else{echo $_GET['search_text'];}?>>

    <input type="submit" value=<?php chooselanguage(10); ?>>

</form>
<form method="get">
    <label for="top">top</label>
    <input type="radio" id="top" name="most" value="top">
    <br>
    <label for="flopp">flopp</label>
    <input type="radio" id="flopp" name="most" value="flopp">
    <br>
    <input type="submit" value="confirm">
</form>
<table class="rating">
    <thead>
    <tr>
        <td><?php chooselanguage(11); ?></td>
        <td><?php chooselanguage(12); ?></td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($showRatings as $rating) {
        echo "<tr>";
        echo "<td class='rating_text'>{$rating['text']}</td>";
        echo"<td class='rating_stars'>"; showstar($rating['stars']);echo "</td>".
            "<td class='rating_name'>{$rating['author']}</td>"."</tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>