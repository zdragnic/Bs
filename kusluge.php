
	<div class="kolona cetri">
		<div class="underline"> <h1>Kozmetičke usluge</h1></div>
        <br>
		<?php
        if (file_exists("Kusluge.xml")) {
        $xml = simplexml_load_file("Kusluge.xml");
        print "<table style='text-align:left; margin-left:30%; margin-right:30%; width:40%;'>";
        print "<tr><th>Naziv usluge</th><th>Cijena</th></tr>";
       
        foreach($xml->kusluga as $kusluga){
        print "<tr><td>".$kusluga->naziv."</td><td>".$kusluga->cijena."KM</td></tr>";

        }
         print "</table>";
        }
        ?>
       
	</div>
