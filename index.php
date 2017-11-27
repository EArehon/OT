<!DOCTYPE html>

<?php 
    include 'db.php';
?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>

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

    $strSQLDepartmen = "SELECT * FROM  departmen";
    $rsDepartmen = mysql_query($strSQLDepartmen);
    
    //выбираем отдел
    while($rowDepartmen = mysql_fetch_array($rsDepartmen)){
        
        printf("
            <tr>
                <td colspan='5'>%s</td>
            </tr>
        ", $rowDepartmen['name']);
        
        //выбираем сотрудников по отделу
        $idDepartmen = $rowDepartmen['id'];
        $strSQLStaff = "SELECT staff.id, staff.full_name, period.period FROM staff LEFT OUTER JOIN period ON staff.id_departmen=period.id_departmen AND staff.id_position=period.id_position WHERE staff.id_departmen='$idDepartmen'";
        $rsStaff = mysql_query($strSQLStaff);
        
        while($rowStaff = mysql_fetch_array($rsStaff)){
            
            $idStaff = $rowStaff['id'];
            $strSQLPhysical = "SELECT physical_type.name, physical.date, physical.comment  FROM physical LEFT OUTER JOIN physical_type ON physical.id_type=physical_type.id WHERE physical.id_staff='$idStaff' AND physical.id_type='1' ORDER BY physical.id DESC LIMIT 1";
            $rsPhysical = mysql_query($strSQLPhysical);

            //выбираем медосмотры по сотруднику
            while($rowPhysical = mysql_fetch_array($rsPhysical)){
                
                if($rowStaff['period'] != null){
                    $dateEnd = new DateTime($rowPhysical['date']);
                    $asd = (string) $rowStaff['period'];
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
                ", $rowStaff['full_name'], $rowPhysical['name'], $rowPhysical['date'], $strDateEnd, $rowPhysical['comment']); 
            }
            
            
                  
        }
    }
    


    /*
    $strSQL = "SELECT * FROM physical";
    $rs = mysql_query($strSQL);

    while($row = mysql_fetch_array($rs)) {
        $PhysicalType = $row['id_type'];
        $idStaff = $row['id_staff'];

        //выбираем данные о сутруднике
        $strSQLStaff = "SELECT * FROM staff WHERE id='$idStaff'";
        $rsStaff = mysql_query($strSQLStaff);
        $rowStaff = mysql_fetch_array($rsStaff);

        $departmenId = $rowStaff['id_departmen'];
        $positionId = $rowStaff['id_position'];
        


        //выбираем тип медосмотра
        $strSQLPhysicalType = "SELECT name FROM physical_type WHERE id='$PhysicalType'";
        $rsPhysicalType = mysql_query($strSQLPhysicalType);
        $rowPhysicalType = mysql_fetch_array($rsPhysicalType);
        

        //$dateEnd = new DateTime('2000-01-01');

        $strPeriod = "SELECT period FROM period WHERE id_departmen=''";


        $dateEnd = new DateTime($row['date']);
        $dateInt = 'P'.'9'.'Y';
        $dateEnd->add(new DateInterval($dateInt));


        

        printf("
            <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
            </tr>
        
        ", $rowStaff['full_name'], $rowPhysicalType['name'], $row['date'], $dateEnd->format('Y-m-d'), $row['comment']);       
    }
    */
?>
    </tbody>
</table>

    
</body>
</html>