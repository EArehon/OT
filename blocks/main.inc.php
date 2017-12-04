<?php
    if (isset($_GET['idPhysical'])){
        $idPhysical = $_GET['idPhysical'];
    }
    else{
        $idPhysical = 1;
    }
    
    
    $physicalType = R::getAll("SELECT * FROM physical_type");
    $lengthPhysicalType = count($physicalType);
    
    
    for($i=0; $i < $lengthPhysicalType; $i++){
        printf("<a href='index.php?idPhysical=%s'>%s</a>", $physicalType[$i]['id'], $physicalType[$i]['name']);
    }

//echo $_SESSION['logged_user']->id_departmen;

?>
<hr>

<table>
<thead>
    <tr>
        <td>ФИО</td>
        <td>Медосмотр</td>
        <td>Дата</td>
        <td>Срок действия</td>
        <td>Комментарий</td>
    </tr>
</thead>
<tbody>

<?php
//выбираем отдел
$departmen = R::getAll('SELECT * FROM departmen');
$lengthDepartmen = count($departmen);

for($i=0; $i < $lengthDepartmen; $i++){
    echo '<tr><td colspan="5" class="departmen">'.$departmen[$i]['name'].'</td></tr>';

    //выбираем сотрудников по отделу и периоды прохождения мед. осмотров
    $departmenId = $departmen[$i]['id'];
    $staff = R::getAll('SELECT staff.id, staff.full_name, period.period FROM staff LEFT OUTER JOIN period ON staff.id_departmen=period.id_departmen AND staff.id_position=period.id_position WHERE staff.id_departmen='.$departmenId);
    $lengthStaff = count($staff);

    for($j=0; $j < $lengthStaff; $j++){
        
        //выбираем мед. осмотры по сотруднику
        $idStaff = $staff[$j]['id'];
        $physical = R::getAll("SELECT physical_type.name, physical.date, physical.comment  FROM physical LEFT OUTER JOIN physical_type ON physical.id_type=physical_type.id WHERE physical.id_staff='$idStaff' AND physical.id_type='$idPhysical' ORDER BY physical.id DESC LIMIT 1");
        $lengthPhysical = count($physical);
        
        for($k=0; $k < $lengthPhysical; $k++){
            
            if($staff[$j]['period'] != null){
                $dateEnd = new DateTime($physical[$k]['date']);
                $asd = (string) $staff[$j]['period'];
                $dateInt = 'P'.$asd.'Y';
                $dateEnd->add(new DateInterval($dateInt));
                $strDateEnd = (string) $dateEnd->format('Y-m-d');
            }
            else{
                $strDateEnd = 'Не указан период';
            }
            
            printf("
            <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
            </tr>
            ", $staff[$j]['full_name'], $physical[$k]['name'], $physical[$k]['date'], $strDateEnd, $physical[$k]['comment']); 
        }
    }

}

?>



</tbody>
</table>




<form action = "<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
    <input type = 'submit' name = 'doLogOut' value = 'Выйти'>
</form>
<?php 
?>