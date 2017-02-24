<?
$cats = [
	
	'colors' =>[ 
		'light' => ['yellow','white'],
		'dark' => ['black','brown','purple','bordeau','graphite'],
	],
	'IT' =>[ 
		'Bools' => ['FALSE','TRUE'],
		'Mobile' => [
			'Phone' => ['Body','Opener'],
			'Smart' => ['Android','WinPh'],
		],
		'Names' => ["Katrin", "Serge", "Ola"],
		'OS' => [
			'Friendly' => ['Win','MacOS'],
			'Engineerly' => ['Linux','Ubuntu'],
		],
	]
];

arr2ul($cats);
?>
<table width=100%>
<tr><td width=50%></td>
<?
function arr2ul($data, $depth = 0){
	if (!is_array($data)) { echo "Что-то не так с входным массивом... \n"; return; }
	
	if(!is_array(current($data))) { //  конечный 
		echo str_repeat("\t", $depth), "<ul> \n";
		foreach($data as $key => $value) {
			echo str_repeat("\t", $depth), "<li>$key - $value</li> \n";
		}
		echo str_repeat("\t", $depth), "</ul> \n";
	}
	if(is_array(current($data))) {  //  промежуточный
		echo str_repeat("\t", $depth), "<ul>\n";
		foreach($data as $key => $value) {
			echo str_repeat("\t", $depth), "<li> $key\n";
			arr2ul($value, $depth+1);
			echo str_repeat("\t", $depth), "</li> \n";
		}
		echo str_repeat("\t", $depth), "</ul>\n";
		
	}
}
?>
<td></td></tr>
</table>