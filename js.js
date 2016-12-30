
var brojac;
function prikaz(naziv){
var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {// Anonimna funkcija

        //ako je status 200 sve ok pa moze ucitat 
        if (ajax.readyState == 4 && ajax.status == 200){
            document.getElementById("main").innerHTML = ajax.responseText;
            
            brojac=1;

        var zz= localStorage.imee;
        var yy= localStorage.maill;

          //da mi scrolla na main odmah 
        document.getElementById('main').scrollIntoView();

        if(naziv === 'onama.html') prikaziSliku(brojac);        
        else if(naziv === 'kontakt.html'){
     if(zz == undefined || yy== undefined){
     localStorage.imee = "";
     localStorage.maill = "";
     localStorage.porukaa = "";
    }
        //localstorage za kontakt formu
        document.getElementById("kontakt-ime").value = localStorage.imee;
        document.getElementById("kontakt-mail").value = localStorage.maill;
        document.getElementById("kontakt-poruka").value = localStorage.porukaa;
}
        
              
  }
        //nije ok
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("main").innerHTML = "Greska: nepoznat URL";    
    }

  
     ajax.open("GET", naziv, true);

     ajax.send();

     return false;
    }


 //funkcija za prikaz menija na mobitelima
 function prikaziMeni() {
	
    var x = document.getElementById("TopNav");
    var y=document.getElementById("nwrapper");
    if(y.className === "navig"){
    	y.className+=" responsive";
    }
    else{y.className="navig";}
   	
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

//funkcija za one slike -> carousel

function listajDugme(n) {
    prikaziSliku(brojac += n);
}

function prikaziSliku(n) {
    var i;
    var x = document.getElementsByClassName("slajd");
    if (n > x.length) {brojac = 1} //ako je na zadnjoj resetuje brojac da moze desno ici
    if (n < 1) {brojac = x.length} ; //ako je na prvoj-1 resetuje na zadnju da moze lijecvo ici
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; //ove ne prikazuje
    }
    x[brojac-1].style.display = "block"; //da samo prikaze onu na kojoj je brojac
  
}


function checkEmail() {

    var email = document.getElementById('newsl-mail');
    var ispravan = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    document.getElementById("news-labela").innerText ='';

    if (ispravan.test(email.value) ) {
   document.getElementById('news-labela').style.visibility = "hidden";
    return true;
 }

 else{
     
    document.getElementById('news-labela').style.visibility = "visible";
    document.getElementById('news-labela').style.color = "#a63955";
    document.getElementById("news-labela").innerText ='Niste unijeli validan email!';
    email.focus();

    return false;
}

}

function validirajKontakt() {

    var email = document.getElementById('kontakt-mail');
    var ime = document.getElementById('kontakt-ime');
    var poruka = document.getElementById('kontakt-poruka');
    document.getElementById("kon-labela").innerText ='';
    var valime= /^[a-žA-Ž]*[\s][a-žA-Ž]*$/;
    var vporuka=/^[a-žA-Ž0-9][a-žA-Ž0-9\s.,?:+]*$/;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!valime.test(ime.value) || ime.value === ""){
    document.getElementById('kon-labela').style.visibility = "visible";
    document.getElementById('kon-labela').style.color = "#a63955";
    document.getElementById("kon-labela").innerText ='Unesite vase ime i prezime(Ime_Prezime)!';  
    ime.focus();
    return false;
    }
    else if (!filter.test(email.value)) {
    document.getElementById('kon-labela').style.visibility = "visible";
    document.getElementById('kon-labela').style.color = "#a63955";
    document.getElementById("kon-labela").innerText ='Niste unijeli validan email!';
    email.focus();
    return false;
 }  
    else if(!vporuka.test(poruka.value) || poruka.value === ""){
    document.getElementById('kon-labela').style.visibility = "visible";
    document.getElementById('kon-labela').style.color = "#a63955";
    document.getElementById("kon-labela").innerText ='Poruka moze sadrzavati slova,brojeve i znakove ?.,:+, te pocinje slovom!';  
    poruka.focus();
    return false;

    }

    
    else{
     document.getElementById('kon-labela').style.visibility = "hidden";
     //postavljamo localstorage
     localStorage.imee = document.getElementById("kontakt-ime").value;
     localStorage.maill = document.getElementById("kontakt-mail").value;
     localStorage.porukaa = document.getElementById("kontakt-poruka").value;
     
     //document.getElementById("kon-dugme").disabled="false";
     return true;

    
}
}
 
