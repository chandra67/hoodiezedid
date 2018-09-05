<?php
	include "../modul/mainFunction.php";
        connect();
        cekLoginAdmin();
        include "../modul/userModule.php";
        
        $user = new user();
        $user->idUser = $_SESSION['idUser'];

        $user->setVar();
        
	global $current;
	$current ='Dashboard';
	include "header.php";

?>
<div class="content">
	<div class="grafik-dashboard">
        <?php  
			$currentDate = strtotime(date('Y-m-d'));
			$weekAgoDate = strtotime('-2 week', $currentDate);
			$weekAgoDateShow = date('d F Y', $weekAgoDate);
			$arrayDateShow = array(14);
			$arrayDate = array(14);
			$i = 0;
			while ($i <= 13)
					{
						$tanggalDB=date('Y-m-d', $currentDate);
						$tanggalTampil=date('d F Y', $currentDate);
						$currentDate = strtotime('previous day', $currentDate);
						$arrayDateShow[$i] = $tanggalTampil;
						$arrayDate[$i] = $tanggalDB;
						$i++;
					}
		?>
        <h3>Visitor Graph (<?php echo "$weekAgoDateShow - ".date('d F Y');?>)</h3>
       	<canvas id="canvas" height="400" width="700"></canvas>

            
            <script>
            
            var lineChartData = {
            labels : [
			<?php 
			$z = 13;
			while($z >= 0){
				echo "\"".$arrayDateShow[$z]."\"";
				
				if($z != 0){
					echo ",";
				}
				$z--;
			} 
			
			?>
			],
            datasets : [
           
            {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            pointColor : "rgba(151,187,205,1)",
            pointStrokeColor : "#fff",
            data : [
			<?php 
                        $z = 13;
			while($z >= 0){
				$date = $arrayDate[$z] ;
				$stoksql = "SELECT * FROM visitorcounter WHERE dateVisitor LIKE '%$date%' AND tipeVisitor='pgload' ORDER BY dateVisitor";
				$runsql = mysql_query($stoksql);
				$total = 0;
				while($r=mysql_fetch_array($runsql)){
					$total += 1;
				}
				echo $total;
				if($z != 0){
					echo ",";
				}
				$z--;
			} 
			
			?>]
            },
                     {
           fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			pointColor : "rgba(151,187,205,1)",
			pointStrokeColor : "#fff",
            data : [
			<?php 
                        $z = 13;
			while($z >= 0){
				$date = $arrayDate[$z] ;
				$stoksql = "SELECT * FROM visitorcounter WHERE dateVisitor LIKE '%$date%' AND tipeVisitor='uniq' ORDER BY dateVisitor";
				$runsql = mysql_query($stoksql);
				$total = 0;
				while($r=mysql_fetch_array($runsql)){
					$total += 1;
				}
				echo $total;
				if($z != 0){
					echo ",";
				}
				$z--;
			} 
			
			?>]
            }
            ]
            
            }
            
            var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
            
            </script>
            <table>
		<tr>
			<td width="180">Page Load:</td>
			<td width="100"><b><?php echo countVisitor('pgload'); ?></b></td>
                        <td width="200">Unique Visitor:</td>
                        <td width="100"><b><?php echo countVisitor('uniq'); ?></b></td>
			
                        <td bgcolor="#cbdde6" width="25"></td>
			<td width="100">Page Load</td>
			<td bgcolor="#b1ccd9" width="25"></td>
			<td width="150">Unique Visitor</td>
		</tr>
            </table><br>
           
    </div>
</div>
<?php
	include "footer.php";
?>