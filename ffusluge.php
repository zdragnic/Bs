<div class="kolona cetri">
		<div class="underline"> <h1>Frizerske usluge</h1></div>

        <br>
		<?php
        if (file_exists("Fusluge.xml")) {
        $xml = simplexml_load_file("Fusluge.xml");
        print "<table style='text-align:left; margin-left:30%; margin-right:30%; width:40%;'>";
        print "<tr><th>Naziv usluge</th><th>Cijena</th></tr>";
       
        foreach($xml->fusluga as $fusluga){
        print "<tr><td>".$fusluga->naziv."</td><td>".$fusluga->cijena."KM</td></tr>";

        }
         print "</table>";
        }
        ?>

</div>