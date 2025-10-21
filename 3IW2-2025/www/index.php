<?php
// Commentaire sur une seule ligne

/*
    Plusieurs lignes
*/

// Les variables
//Convention de nommage : camelCase (PascalCase, snake_case, kebab-case)
//Anglais
//Cohérence
$myFirstname;

//Déclaration dynamique
//Typage dynamique
//Types : String, Int, Bool, Float, Null
$myFirstname = "Yves";
$myFirstname = 12;

/*
//Pointeurs / références
$myAge = 40;
$yourAge = 22;
$yourAge = &$myAge;
$myAge = 12;
echo $yourAge;


//Incrémentation et la décrémentation
$cpt = 0;
$cpt += 1;
$cpt = $cpt + 1;
$cpt++; //Post incrémentation
++$cpt; //Pré incrémentation


$i=0;
$i++;
echo $i++; //1
echo --$i; //1
echo $i + 1; //2
echo $i += 1; //2
echo $i; //2
echo $i = $i + 1; //3
echo $i; //3



//Conditions : IF
$age = 19;
if($age === 18){
    echo "Tout juste majeur";
}else if ($age>18) {
    echo "Majeur";
}else{
    echo "Mineur";
}

if($age === 18):
    echo "Tout juste majeur";
else :
    echo "Mineur";
endif;


//Conditions : switch
$role = "admin";

switch ($role){
    case "admin":
        echo "Peut tout faire";
        break;
    case "editeur":
        echo "Modifier les contenus";
    case "author":
        echo "Modifier ses contenus";
    default:
        echo "Consulter le site";
        break;
}

// Condition : Match
$food = 'cake';
$return_value = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
};

//Condition : Ternaire
$major = true;

if($major){
    echo "Majeur";
}else{
    echo "Mineur";
}

// Instruction (condition)?"vrai":"faux";
echo ($major)?"Majeur":"Mineur";


//Condition : Null coalescent
echo $myFirstname??"Anonyme";
echo (empty($myFirstname))?"Anonyme":$myFirstname;

$myFirstname = "Yves";

//Concaténation
echo "Bonjour ".$myFirstname;
echo "Bonjour $myFirstname";
echo 'Bonjour $myFirstname';


//Echappement des caractères
echo 'Aujourd\'hui "c\'est" le cours de "PHP"';



//Boucles :
// While => Tant que (un nombre indeterminé d'ittération)

$dice = rand(1, 6);
$cpt = 1;
while ($dice != 6){
    $dice = rand(1, 6);
    $cpt++;
}
echo $cpt." tentative(s)";

// Do While => Fait tant que (au moins 1 ittération)

$cpt = 0;
do{
    $dice = rand(1, 32);
    $cpt++;
}while ($dice != 6);
echo $cpt." tentative(s)";
// For => Pour (un nombre determiné d'ittération)
for ($cpt = 0 ; $cpt <10 ; ++$cpt){
    echo $cpt."-";
}


//Tableau ou array
$students = ["Aurélien", "Thomas", "Alban", "Nil"];
//$students = array("Aurélien", "Thomas", "Alban", "Nil");
//echo $students; //Pas pour un tableau

//Ajouter une valeur dans un tableau
$students[12]="Mathéo";
$students[]="Claudiu";

echo "Bonjour ".$students[2];






$student = [
            "lastname"=>"Michel",
            "firstname"=>"Martin",
            "average"=>12
            ];

$student[] = 20;
//Afficher Prénom nom a une moyenne de note
echo $student["firstname"]." ".$student["lastname"]." a une moyenne de ".$student["average"];

//Pour du debug
echo "<pre>";
//var_dump($students);
print_r($student);
echo "</pre>";
$esgi=[
            "IW"=>[
                3=>[
                    "classe 1"=>[],
                    "classe 2"=>["Aurélien", "Thomas", "Alban", "Nil"],
                ],
                4=>[
                    "classe 1"=>[],
                    "classe 2"=>[],
                    ],
                5=>[
                    "classe 1"=>[],
                    "classe 2"=>[],
                    ],
            ],
            "AL"=>[
                3=>[
                    "classe 1"=>[],
                    "classe 2"=>[],
                    ],
                4=>[
                    "classe 1"=>[],
                    "classe 2"=>[],
                ],
                5=>[
                    "classe 1"=>[],
                    "classe 2"=>[],
                ],
            ],
            1=>[
                "classe 1"=>[],
                "classe 2"=>[],
            ],
            2=>[
                "classe 1"=>[],
                "classe 2"=>[],
            ]
        ];


echo "Bonjour ".$esgi["IW"][3]["classe 2"][0];



$array =
    [
        [ ] ,
        [
            [
                [
                    [ ] ,
                    [
                        [
                            [ ]
                        ]
                    ]
                ] ,
                [ ]
            ]
        ]
    ];


echo "<pre>";
print_r($array);
echo "</pre>";


// Foreach => Pour chaque (TABLEAUX ou objets)

$students = ["Aurélien", "Thomas", "Alban", "Nil"];

$students[12]="Mathéo";

echo "<ul>";
foreach ($students as $key=>$student){
    echo "<li>".$student." possède la clé ".$key."</li>";
}
echo "</ul>";

*/

$students = [
    [
        "prenom" => "Alice",
        "nom" => "Martin",
        "email" => "alice.martin@example.com",
        "note1" => 14,
        "note2" => 16,
        "age" => 17
    ],
    [
        "prenom" => "Thomas",
        "nom" => "Dupont",
        "email" => "thomas.dupont@example.com",
        "note1" => 12,
        "note2" => 15,
        "age" => 18
    ],
    [
        "prenom" => "Sophie",
        "nom" => "Durand",
        "email" => "sophie.durand@example.com",
        "note1" => 17,
        "note2" => 13,
        "age" => 17
    ],
    [
        "prenom" => "Lucas",
        "nom" => "Petit",
        "email" => "lucas.petit@example.com",
        "note1" => 11,
        "note2" => 14,
        "age" => 16
    ],
    [
        "prenom" => "Emma",
        "nom" => "Lemoine",
        "email" => "emma.lemoine@example.com",
        "note1" => 15,
        "note2" => 18,
        "age" => 17
    ],
    [
        "prenom" => "Nathan",
        "nom" => "Moreau",
        "email" => "nathan.moreau@example.com",
        "note1" => 13,
        "note2" => 12,
        "age" => 16
    ],
    [
        "prenom" => "Camille",
        "nom" => "Laurent",
        "email" => "camille.laurent@example.com",
        "note1" => 16,
        "note2" => 14,
        "age" => 18
    ],
    [
        "prenom" => "Julien",
        "nom" => "Garcia",
        "email" => "julien.garcia@example.com",
        "note1" => 10,
        "note2" => 13,
        "age" => 17
    ],
    [
        "prenom" => "Chloé",
        "nom" => "Roux",
        "email" => "chloe.roux@example.com",
        "note1" => 18,
        "note2" => 17,
        "age" => 16
    ],
    [
        "prenom" => "Antoine",
        "nom" => "Vincent",
        "email" => "antoine.vincent@example.com",
        "note1" => 9,
        "note2" => 11,
        "age" => 18
    ],
    [
        "prenom" => "Léa",
        "nom" => "Fournier",
        "email" => "lea.fournier@example.com",
        "note1" => 13,
        "note2" => 15,
        "age" => 17
    ],
    [
        "prenom" => "Maxime",
        "nom" => "Henry",
        "email" => "maxime.henry@example.com",
        "note1" => 12,
        "note2" => 14,
        "age" => 16
    ],
];


$newStudents = [];

foreach ($students as $student){
    $average = ($student["note1"]+$student["note2"])/2;
    $average = round($average, 1)*10;
    $newStudents[$average][]=$student;
}

krsort($newStudents);

?>

<table>
    <thead>
    <tr>
        <th>Rang</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Moyenne</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $rank = 1;
    foreach ($newStudents as $average=>$studentsWithSameAverage){

        foreach ($studentsWithSameAverage as $student){
            echo "<tr>";
            echo "<td>".$rank."</td>";
            echo "<td>".$student["nom"]."</td>";
            echo "<td>".$student["prenom"]."</td>";
            echo "<td>".($average/10)."</td>";
            echo "</tr>";
        }

        $rank++;
    }

    ?>
    </tbody>
</table>







